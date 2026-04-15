<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function test()
    {
//        $tag = new Tag();
//        $tag->name = 'test_1';
//        $tag->slug = 'test-1';
//        $tag->save();

        $tag = Tag::create([
            'name' => 'test_2',
            'slug' => 'test-2'
        ]);

    }
}