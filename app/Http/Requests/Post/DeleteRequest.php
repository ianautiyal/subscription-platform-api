<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{
    public function rules()
    {
        return [];
    }

    public function bodyParameters()
    {
        return [];
    }
}
