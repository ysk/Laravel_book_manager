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

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ここでフォームのデータを処理する
        // これから
       

        return redirect()->back()->with('message', 'お問い合わせが送信されました。');
    }

}
