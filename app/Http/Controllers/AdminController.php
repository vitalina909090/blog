<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
//    public function dahsboard()
//    {
//        if (Gate::denies('access-admin-panel'))
//            abort(403);
//
//        if (!auth()->user()->can('access-admin-panel'))
//            abort(403);
//
//        // return view('admin.dahsboard');
//    }
//
//    public function deletePost($id)
//    {
//        if (Gate::denies('delete-any-post'))
//            abort(403);
//    }


    public function indexAllPosts()
    {
        $posts = Post::all();
        return $posts;
    }


    public function createPost()
    {
        $this->authorize('create', Post::class);

        return 'create post';
    }
}
