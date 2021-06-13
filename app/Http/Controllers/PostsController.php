<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user'])->get();

        return view('pages.posts.all')->with(compact('posts'));
    }

    public function show(Post $post)
    {
        $post = $post->load(['user']);

        return view('pages.posts.one')->with(compact('post'));
    }
}
