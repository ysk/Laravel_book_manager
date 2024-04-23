<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Http\Requests\ContactFormRequest;

class ContactController extends Controller
{

    /**
     * フォーム入力画面の表示
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function show()
    {
        $contactFormData = session('contact_form_data');
        return view('contact.show', ['contact_form_data' => $contactFormData]);
    }
    
    /**
     * 送信内容をセッションに保存、確認画面へ遷移
     *
     * @param ContactFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ContactFormRequest $request)
    {
        $contactFormData = $request->all();
        $request->session()->put('contact_form_data', $contactFormData);
        return redirect()->route('contact.confirm');
    }
    
    /**
     * 確認画面の表示
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function confirm(Request $request)
    {
        $contactFormData = $request->session()->get('contact_form_data');
        return view('contact.confirm', ['contact_form_data' => $contactFormData]);
    }
    
    /**
     * お問い合わせの送信
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(Request $request)
    {
        $contactFormData = $request->session()->get('contact_form_data');

        if (!$contactFormData) {
            return redirect()->route('contact.show')->with('error', 'お問い合わせフォームが見つかりませんでした。');
        }

        Mail::to('admin@example.com')->send(new ContactFormMail($contactFormData));
        Mail::to($contactFormData['email'])->send(new ContactFormMail($contactFormData));
        
        // 送信後にセッションを破棄
        $request->session()->forget('contact_form_data');
        return redirect()->route('contact.show')->with('message', 'お問い合わせが送信されました。');
    }

}