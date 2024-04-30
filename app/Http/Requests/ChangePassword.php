<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\{Auth,Hash};

class ChangePassword extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'old_password' => [
                'required',
                function ($attribute, $inputPassword, $fail) {
                    $user = Auth::user();
                    $hashedPasswordInDatabase = $user->password;
                    
                    // DB内にハッシュ化されて保存されている文字列とパスワードを比較する
                    $is_PasswordCorrect = Hash::check($inputPassword, $hashedPasswordInDatabase);

                    if (!$is_PasswordCorrect) {
                        $fail('現在のパスワードを正しく入力してください');
                    }

                }
            ],
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}
