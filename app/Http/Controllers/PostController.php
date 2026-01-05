<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate; // Importante para usar Gate

class PostController extends Controller
{
    // GET /posts
    public function index()
    {
        return Post::with('user')->get();
    }

    // POST /posts
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|min:3|max:255',
            'content' => 'required|min:10',
        ]);

        $post = Post::create([
            'title'   => $request->title,
            'content' => $request->content,
            'user_id' => 1 // Cambiar a auth()->id() cuando tengas login
        ]);

        return response()->json([
            'message' => 'Post creado correctamente',
            'post' => $post
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id); // failOrFail lanza 404 automáticamente si no existe

        // 🛡️ APLICAR POLICY
        // Esto verifica el método 'update' en PostPolicy.php
        Gate::authorize('update', $post);

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

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return response()->json($post);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // 🛡️ APLICAR POLICY
        // Esto verifica el método 'delete' en PostPolicy.php
        Gate::authorize('delete', $post);

        $post->delete();

        return response()->json([
            'message' => 'Post eliminado correctamente'
        ]);
    }
}
