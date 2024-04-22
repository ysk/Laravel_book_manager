<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\Category;

class SearchController extends Controller
{
    public function searchQuery(Request $request)
    {

        $query = $request->input('query');
        $booksQuery = Book::where('item_name', 'like', '%'.$query.'%');

        // カテゴリIDが指定されていれば、絞り込み条件を追加
        $categoryId = $request->input('category_id');
        if ($categoryId) {
            $booksQuery->where('category_id', $categoryId);
        }

        $books = $booksQuery->paginate(20);
        return view('search.results', ['books' => $books]);

    }
}
