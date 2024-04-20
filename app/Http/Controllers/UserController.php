<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Book;

class UserController extends Controller
{
    public function show($id)
    {

        $id    = Auth::id();
        $user  = User::find($id);
        $books = Book::where('user_id', $id)->orderBy('created_at', 'desc')->paginate(10);
        return view('mypage.user_show',[
            'user'  => $user,
            'books' => $books,
        ]);


    }
}
