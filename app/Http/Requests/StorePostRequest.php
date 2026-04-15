<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StorePostRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    public function authorize(): bool
    {
        return true;
//        return $this->user() !== null;
//        return $this->user()->role === 'admin';
//        return Gate::allows('post-create', Post::class);

//        $post = $this->route('post');
//        return $this->user()->id === $post->author_id;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'author_id' => $this->user()->id
        ]);

        $this->merge([
            'slug' => \Str::slug($this->title),
        ]);

        $this->request->remove('password_confirmation');
    }

    public function rules(): array
    {
//        return [
//            'title' => 'required|string|max:255',
//            'content' => 'required|string|min:10',
//
//            // 'email' => 'required|email|unique:users,email',
//            // 'status' => 'required|in:draft,published,archived',
//
////            'user.name' => 'required|string|max:255',
////            'user.email' => 'required|string|email|max:255',
////            'posts.*.title' => 'required|string|max:255',
////            'posts.*.content' => 'required|string|min:10',
//        ];

        return [
            'title' => ['required', 'string', 'max:255'],
        ];

    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле :attribute обязательно',
            'title.max' => 'Заголовок не может превышать :max символов'
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'заголовок',
            'content' => 'содержимое'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $exists = Post::where('title', $this->titls)
                ->where('author_id', $this->user()->id)
                ->exists();

            if ($exists) {
                $validator->errors()->add('title', 'У Вас уже есть пост с таким заголовком');
            }
        });
    }
}
