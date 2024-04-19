<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'item_name' => 'required',
            'item_number' => 'required',
            'item_amount' => 'required',
            'published' => 'required',
        ];
    }
}

