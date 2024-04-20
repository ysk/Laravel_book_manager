<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function rules(): array
    {

        $rules =  [
            'user_id' => 'integer',
            'item_name' => 'required|string',
            'item_number' => 'integer',
            'item_amount' => 'integer',
            'published' => 'date',
        ];

        return $rules;

        
    }
}

