<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules()
    {
        $required = $this->method() === 'PATCH' ? 'required' : 'nullable';

        return [
            'title' => [$required, 'string', 'max:255'],
            'description' => [$required, 'string', 'max:1000'],
        ];
    }

    public function bodyParameters()
    {
        return [
            'title' => [
                'description' => __('The title of post.'),
                'example' => 'Sit vitae voluptas sint non voluptates'
            ],
            'description' => [
                'description' => __('The description of post.'),
                'example' => 'Blanditiis neque aut eos dolores. Ea eius qui architecto. Natus tempora in voluptatem dolorem nobis placeat totam qui. Quo consectetur at minima iure repellendus nemo dolor. Est nesciunt voluptatibus soluta maiores sint. Aut id tempora maxime eaque qui id. Voluptas ipsum pariatur sed. Et tempora repellendus fugiat aut nam error. Aliquam voluptates magni non nobis delectus. Quia dolorem beatae molestias molestiae perferendis. Labore vel quia est vitae. Nobis incidunt aliquid possimus distinctio. Deserunt aut sed sapiente sit. Eaque voluptates vel optio ut quam in. Voluptas vero iste sed non nostrum a. Dolores dolor natus sed necessitatibus tenetur. Nobis magnam veniam omnis delectus. Voluptatem voluptate perspiciatis ratione est. Sed saepe veniam consequatur voluptates id numquam esse. Ducimus deserunt dolore in illo aut ut error. Velit occaecati distinctio possimus eos. Rerum culpa temporibus voluptatem mollitia quo.'
            ],
        ];
    }
}
