<?php

namespace App\Http\Requests\Website;

use App\Models\Website;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules()
    {
        $required = $this->method() === 'PATCH' ? 'required' : 'nullable';

        return [
            'domain' => [$required, 'regex:/^[a-zA-Z0-9][a-zA-Z0-9-_]{0,61}[a-zA-Z0-9]{0,1}\.([a-zA-Z]{1,6}|[a-zA-Z0-9-]{1,30}\.[a-zA-Z]{2,3})$/i', 'unique:' . Website::class, 'max:255'],
        ];
    }

    public function bodyParameters()
    {
        return [
            'domain' => [
                'description' => __('The domain of website.'),
                'example' => 'example.com'
            ],
        ];
    }
}
