<?php

namespace App\Http\Requests\Prod;

use Illuminate\Foundation\Http\FormRequest;

class EditPostRequest extends FormRequest
{



    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:10',
        ];
    }

    public function redirect(): string
    {
        $postId = $this->route('post');
        return route('posts.edit', ['post' => $postId]);
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Заголовок обязателен',
            'title.max' => 'Заголовок не может превышать :max символов',
            'content.required' => 'Содержимое обязательно',
            'content.min' => 'Содержимое должно содержать не менее :min символов'
        ];
    }
}
