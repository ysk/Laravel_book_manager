<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class BookRequest
 *
 * @package App\Http\Requests
 */
class BookRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {

        $rules =  [
            'user_id'        => 'integer',
            'category_id'    => 'required|integer',
            'item_thumbnail' => 'nullable|image|mimes:png,jpg,gif|max:7168', 
            'item_name'      => 'required|string',
            'item_review'    => 'nullable|string',
            'item_price'     => 'nullable|integer',
            'published_at'   => 'nullable|date',
        ];

        return $rules;

    }
}

