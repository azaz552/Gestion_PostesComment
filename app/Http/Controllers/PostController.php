<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // 📌 Display all posts
    public function index(Request $request)
    {
        $query = Post::query();

        // 🔎 Search
        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $posts = $query->latest()->paginate(5);

        return view('posts.index', compact('posts'));
    }

    // 📌 Show create form
    public function create()
    {
        return view('posts.create');
    }

    // 📌 Store new post
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'content' => 'required',
            'image' => 'nullable|image'
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('posts.index')
                         ->with('success', 'Post created successfully!');
    }

    // 📌 Show single post
    public function show(Post $post)
    {
        $post->load('comments');

        return view('posts.show', compact('post'));
    }

    // 📌 Edit form
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // 📌 Update post
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $request->validate([
            'title' => 'required|min:3',
            'content' => 'required',
            'image' => 'nullable|image'
        ]);

        $imagePath = $post->image;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath
        ]);



        return redirect()->route('posts.index')
                         ->with('success', 'Post updated successfully!');
    }

    // 📌 Delete post
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('posts.index')
                         ->with('success', 'Post deleted successfully!');
    }
}