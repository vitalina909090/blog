<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('include.posts', compact('posts'));

//        return response()->json([
//            'success' => true,
//            'data' => $posts
//        ]);
    }

    public function posts_table()
    {
        $posts = Post::with('author')->get();

        return view('pages.posts_table', compact('posts'));
    }

    public function show(Post $post)
    {
        return response()->json([
            'success' => true,
            'data' => $post
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required|string',
            'author_id' => 'required|integer|exists:users,id',
            'is_published' => 'boolean',
            'slug' => 'required|string|unique:posts,slug'
        ]);

        $post = Post::create($validated);

        return response()->json([
            'success' => true,
            'data' => $post
        ], 201);
    }


}
