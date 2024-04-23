<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Http\Requests\ContactFormRequest;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact.show');
    }

    public function send(ContactFormRequest $request)
    {
        $this->sendContactEmails($request);
        return redirect()->back()->with('message', 'お問い合わせが送信されました。');
    }

    private function sendContactEmails(Request $request)
    {
        Mail::to('admin@example.com')->send(new ContactFormMail($request->all()));
        Mail::to($request->email)->send(new ContactFormMail($request->all()));
    }
}
