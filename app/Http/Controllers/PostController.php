<?php

namespace App\Http\Controllers;

use App\Http\Requests\Prod\CreatePostRequest;
use App\Http\Requests\Prod\EditPostRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Str;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::where('is_published', true)
            ->latest()
            ->get();

        return view('posts.index', compact('posts'));
    }
    
    public function myposts()
    {
        $posts = Post::where('author_id', Auth::id())
            ->where('is_published', true)
            ->latest()
            ->get();

        return view('posts.myposts', compact('posts'));
    }

    public function drafts()
    {
        $posts = Post::where('author_id', Auth::id())
            ->where('is_published', false)
            ->latest()
            ->get();

        return view('posts.drafts', compact('posts'));
    }

    public function publish(Post $post)
    {
        $this->authorize('update', $post);

        $post->update(['is_published' => true]);

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Пост успешно опубликован'
        ]);

        return redirect()->route('posts.drafts');
    }

    public function show(Post $post)
    {
        // TODO: ??? for anonymus
        $this->authorize('view', $post);

        return view('posts.show', compact('post'));
    }

    public function create()
    {
        $this->authorize('create', Post::class);

        return view('posts.create');
    }

    public function store(CreatePostRequest $request)
    {
        $validated = $request->validated();

        $validated['author_id'] = Auth::id();
        $validated['slug'] = Str::slug(Str::limit($validated['title'], 10));

        Post::create($validated);

        $message = $validated['is_published']
            ? 'Пост успешно создан'
            : 'Черновик успешно создан';

        session()->flash('alert', [
            'type' => 'success',
            'message' => $message
        ]);

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    public function update(EditPostRequest $request, Post $post)
    {
        $validated = $request->validated();

        $post->update($validated);

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Пост успешно обновлён'
        ]);

        return redirect()->route('posts.show', $post);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Пост успешно удалён'
        ]);

        return redirect()->route('posts.index');
    }
}