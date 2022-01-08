<?php

namespace App\Http\Requests\Subscription;

use Illuminate\Foundation\Http\FormRequest;

class SubscribeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => ['required', 'email', 'max:255'],
        ];
    }

    public function bodyParameters()
    {
        return [
            'email' => [
                'description' => __('The email of subscriber.'),
                'example' => 'me@example.com'
            ],
        ];
    }
}
