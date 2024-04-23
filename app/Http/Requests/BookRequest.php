<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function rules(): array
    {

        $rules =  [
            'user_id'        => 'integer',
            'category_id'    => 'required|integer',
            'item_name'      => 'required|string',
            'item_thumbnail' => 'nullable|image|mimes:png,jpg,gif|max:7168', 
            'item_number'    => 'nullable|integer',
            'item_price'    => 'nullable|integer',
            'published_at'   => 'nullable|date',
            'item_review'    => 'nullable|string',
        ];

        return $rules;

        
    }
}

