<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 

class ContactController extends Controller
{

    public function show()
    {
        return view('contact.show');
    }

    public function send(Request $request)
    {
        // バリデーションルールの定義
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // バリデーションが失敗した場合の処理
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ここでフォームのデータを処理する
        // 例えば、メール送信やデータベースへの保存など

        // お問い合わせが送信された後、成功メッセージを表示してリダイレクト
        return redirect()->back()->with('message', 'お問い合わせが送信されました。');
    }

}
