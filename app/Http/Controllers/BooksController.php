<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Mail};
use App\Http\Requests\BookRequest;
use App\Jobs\SendTestMailJob;
use App\Models\{User, Book, Category};
use Carbon\Carbon;

class BooksController extends Controller
{

    public function __construct()
    {
    }

    /**
     * 書籍の一覧を表示する。
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
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
    public function create(): \Illuminate\Contracts\View\View
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
    public function store(BookRequest $request, Book $book): \Illuminate\Http\RedirectResponse
    {
        $file = $request->file('item_thumbnail');
        if (!is_null($file)) {
            $filePath = $file->store('public/uploads');
            $filename = basename($filePath);
        }
        $book->user_id        = Auth::id();
        $book->fill($request->validated());
        $book->item_thumbnail = $filename ?? null;
        $book->save();
        return redirect('/')->with('message', '書籍を登録しました');
    }


    /**
     * 指定された書籍を表示する。
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show(int $id): \Illuminate\Contracts\View\View
    {
        return view('books.show', [
            'book'    => Book::findOrFail($id),
            'body_id' => 'books_show'
        ]);
    }

    /**
     * 指定された書籍を編集するためのフォームを表示する。
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        return view('books.edit', [
            'book'    => Book::findOrFail($id),
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
    public function update(BookRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {        
        $book = Book::find($id);
        $book->fill($request->validated());
        $book->save();
        return redirect('/')->with('message','書籍を更新しました');
    }

    /**
     * 指定された書籍を削除する。
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $book = Book::find($id);
        $book->delete();
        return redirect('/')->with('message','書籍を削除しました');
    }

}




