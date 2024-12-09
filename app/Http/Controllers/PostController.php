<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index', [
            'notifications' => DB::table('notifications')->get(),

            'posts' => Post::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'author' => 'required|string|max:80',
            'content' => 'required',
        ]);

        $post = Post::create($validated);

        event(new PostCreated($post));

        return redirect()->back()->with('success', 'Post créé avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'author' => 'required|string|max:80',
            'content' => 'required',
        ]);

        $post->update($validated);

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect(route('posts.index'));
    }
}
