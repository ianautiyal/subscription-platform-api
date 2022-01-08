<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class ListRequest extends FormRequest
{
    public function rules()
    {
        return [
            'length' => ['nullable', 'integer', 'max:100'],
            'page' => ['nullable', 'integer'],
            'search' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function queryParameters()
    {
        return [
            'length' => [
                'description' => __('The number of items for the current page.'),
                'example' => 5
            ],
            'page' => [
                'description' => __('The current page number.'),
                'example' => 1
            ],
            'search' => [
                'description' => __('The keyword to search items.'),
                'example' => ''
            ],
        ];
    }
}
