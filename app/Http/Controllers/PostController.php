<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // GET /posts
    public function index()
    {
        return Post::all();
    }

    // POST /posts
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|min:3|max:255',
            'content' => 'required|min:10',
        ]);

        $post = Post::create($request->only('title', 'content'));

        return response()->json([
            'message' => 'Post creado correctamente',
            'post' => $post
        ], 201);
    }
}
