<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\{Auth,Mail};;
use App\Http\Requests\{UserRequest,UserprofRequest};
use App\Models\{Book,Category,User,Userprof};

class UserprofController extends Controller
{
    /**
     * 指定されたユーザーの情報と関連する書籍を表示
     *
     * @param int $id 表示するユーザーのID
     * @return \Illuminate\View\View
     */
    public function show(int $id)
    {
        $user  = User::find($id);
        $books = Book::where('user_id', $id)
                        ->orderBy('created_at', 'desc')
                        ->paginate(15);
        return view('users.show', [
            'user'    => $user,
            'books'   => $books,
            'body_id' => 'user_show',
        ]);
    }

    public function edit(int $id){
        $user  = User::find($id);
        $books = Book::where('user_id', $id)
                        ->orderBy('created_at', 'desc')
                        ->paginate(15);
        return view('users.edit', [
            'user'    => $user,
            'books'   => $books,
            'body_id' => 'user_edit',
        ]);
    }
}
