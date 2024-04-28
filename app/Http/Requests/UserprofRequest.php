<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserprofRequest
 *
 * @package App\Http\Requests
 */
class UserprofRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
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
        $rules =  [
            'prof_thumbnail' => 'nullable|image|mimes:png,jpg,gif|max:7168', 
            'address'        => 'nullable|string',
            'phone'          => 'nullable|string',
            'github_url'     => 'nullable|string',
            'prof_text'      => 'nullable|string',
        ];

        return $rules;
    }
}
