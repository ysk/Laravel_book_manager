<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\{Auth, Mail, Hash};
use App\Http\Requests\{UserRequest, UserprofRequest, ChangePassword};
use App\Models\{Book, Category, User, Userprof};

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

        $user = User::find($id);
        $books = Book::where('user_id', $id)
                     ->orderBy('created_at', 'desc')
                     ->paginate(15);
                     
        return view('users.show', [
            'user' => $user,
            'books' => $books,
            'body_id' => 'user_show',
        ]);
    }

    /**
     * ユーザープロフィールを編集するためのビューを表示
     *
     * @param int $id 編集するユーザーのID
     * @return \Illuminate\View\View
     */
    public function edit(int $id)
    {

        $user = User::find($id);
        $books = Book::where('user_id', $id)
                     ->orderBy('created_at', 'desc')
                     ->paginate(15);
                     
        return view('users.edit', [
            'user' => $user,
            'books' => $books,
            'body_id' => 'user_edit',
        ]);
    }

    /**
     * ユーザープロフィールを更新する
     *
     * @param \App\Http\Requests\UserprofRequest $request ユーザープロフィールのリクエスト
     * @param int $id 更新するユーザーのID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserprofRequest $request, int $id)
    {
        $file = $request->file('prof_thumbnail');
        $filename = null;
    
        if (!is_null($file)) {
            $filePath = $file->store('public/uploads');
            $filename = basename($filePath);
        }
    
        $userProf = Userprof::where('user_id', $id)->first();
        if (!$userProf) {
            $userProf = new Userprof();
            $userProf->user_id = $id;
        }

        $userProf->fill($request->validated());
        $userProf->prof_thumbnail = $filename;
        $userProf->save();
    
        return redirect()->route('user.show', ['id' => $id])->with('message', '書籍を更新しました');
    }

    /**
     * ユーザープロフィールを削除する
     *
     * @param \App\Http\Requests\UserprofRequest $request ユーザープロフィールのリクエスト
     * @param int $id 更新するユーザーのID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(UserprofRequest $request, int $id)
    {

        Book::where('user_id', $id)->delete();
        Userprof::where('user_id', $id)->delete();
        User::destroy($id);

        return redirect()->route('books.index')->with('message', '退会処理が正常に完了しました');
    }

    /**
     * パスワード変更画面を表示
     *
     * @return \Illuminate\View\View
     */
    public function change_pass()    
    {
        return view('users.change_pass');

    }

    /**
     * パスワードを更新する
     *
     * @param \App\Http\Requests\ChangePassword $request パスワード変更のリクエスト
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update_pass(ChangePassword $request)
    {

        $id = Auth::id();
        $user = User::find($id);

        $user->password = bcrypt($request->password);
        $user->save();
        $request->session()->flash('message', 'パスワードが変更されました');

        return redirect()->route('user.show');
    }


}
