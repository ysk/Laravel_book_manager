<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BookRequest;
use App\Jobs\SendTestMailJob;
use App\Models\{Book,Category,User,Userprof};
use Carbon\Carbon;

class BooksController extends Controller
{

    /**
     * 書籍の一覧を表示する。
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $books = Book::with('category')->orderBy('created_at', 'desc')->paginate(20);
        return view('books.index', [
            'books'   => $books,
            'body_id' => 'books_index'
        ]);
    }
    
    /**
     * 新しい書籍を作成するためのフォームを表示する。
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('books.create', [
            'body_id' => 'books_create'
        ]);
    }

    /**
     * 新しい書籍を保存する。
     *
     * @param BookRequest $request
     * @param Book $book
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BookRequest $request, Book $book)
    {
        $file = $request->file('item_thumbnail');
        $filename = null;
        if (!is_null($file)) {
            $filePath = $file->store('public/uploads');
            $filename = basename($filePath);
        }
        $book->user_id        = Auth::id();
        $book->fill($request->validated());
        $book->item_thumbnail = $filename;
        $book->save();
        return redirect()
            ->route('books.index')
            ->with('message', '書籍を登録しました');
    }


    /**
     * 指定された書籍を表示する。
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show(int $id)
    {
        return view('books.show', [
            'book'    => Book::find($id),
            'body_id' => 'books_show'
        ]);
    }

    /**
     * 指定された書籍を編集するためのフォームを表示する。
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        return view('books.edit', [
            'book'    => Book::find($id),
            'body_id' => 'books_edit'
        ]);
    }

    /**
     * 指定された書籍を更新する。
     *
     * @param BookRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BookRequest $request, int $id)
    {        
        $book = Book::find($id);
        $book->fill($request->validated());
        $book->save();
        return redirect()
            ->route('books.show', ['id' => $book->id])
            ->with('message', '書籍を更新しました');
    }

    /**
     * 指定された書籍を削除する。
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, int $id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()
            ->route('books.index')
            ->with('message', '書籍を削除しました');
    }

}




