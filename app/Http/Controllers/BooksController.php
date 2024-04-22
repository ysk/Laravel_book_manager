<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\BookRequest;
use App\Jobs\SendTestMailJob;
use App\Models\User;
use App\Models\Book;
use App\Models\Category;

class BooksController extends Controller
{

    public function __construct()
    {
        
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('category')->orderBy('created_at', 'desc')->paginate(5);
        return view('books.index', [
            'books' => $books
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request, Book $book)
    {
        $book->user_id = Auth::id();
        $book->fill($request->validated());
        $book->save();
        return redirect('/')->with('message','書籍を登録しました');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('books.show', [
            'book' => Book::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('books.edit', [
            'book' => Book::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, $id)
    {        
        $book = Book::find($id);
        $book->fill($request->validated());
        $book->save();
        return redirect('/')->with('message','書籍を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect('/')->with('message','書籍を削除しました');
    }
}
