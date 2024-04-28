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
        $books = Book::where('user_id', $id)->orderBy('created_at', 'desc')->paginate(15);
        return view('users.show', [
            'books'   => $books,
            'body_id' => 'user_show',
        ]);
    }

    public function edit(int $id)
    {
        $books = Book::where('user_id', $id)->orderBy('created_at', 'desc')->paginate(15);
        return view('users.edit', [
            'books'   => $books,
            'body_id' => 'user_edit',
        ]);
    }

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
    
        return redirect()->route('profile.show', ['id' => $id])->with('message', '書籍を更新しました');
    }
    
    
}
