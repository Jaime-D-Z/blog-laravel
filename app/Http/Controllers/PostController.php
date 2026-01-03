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
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'message' => 'Post no encontrado'
            ], 404);
        }

        $request->validate([
            'title'   => 'required|min:3|max:255',
            'content' => 'required|min:10',
        ]);

        $post->update($request->only('title', 'content'));

        return response()->json([
            'message' => 'Post actualizado',
            'post' => $post
        ]);
    }
    // GET /api/posts/{id}
    public function show($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Post no encontrado'], 404);
        }

        return response()->json($post);
    }

    // DELETE /api/posts/{id}
    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'message' => 'Post no encontrado'
            ], 404);
        }

        $post->delete();

        return response()->json([
            'message' => 'Post eliminado correctamente'
        ]);
    }
}
