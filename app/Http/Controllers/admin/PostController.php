<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Use pagination instead of all()
        $posts = Post::with('category')->latest()->paginate(10);

        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|max:255',
            'content'     => 'required',
            'thumbnail'   => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        DB::transaction(function () use ($request) {
            $post = new Post();
            $post->user_id = auth()->id();
            $post->title = $request->title;
            $post->content = $request->content;

            if ($request->hasFile('thumbnail')) {
                $fileName = time() . '_' . $request->file('thumbnail')->getClientOriginalName();
                $request->file('thumbnail')->storeAs('uploads', $fileName, 'public');

                // Save relative path
                $post->thumbnail = 'uploads/' . $fileName;
            }

            $post->category_id = $request->category_id;
            $post->save();

            if ($request->has('tags')) {
                $post->tags()->sync($request->tags);
            }
        });

        return redirect()->route('admin.post.index')
                         ->with('success', 'Post created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title'       => 'required|max:255',
            'content'     => 'required',
            'thumbnail'   => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post = Post::findOrFail($id);
        $post->user_id = auth()->id();
        $post->title = $request->title;
        $post->content = $request->content;

        if ($request->hasFile('thumbnail')) {
            // Delete old file if exists
            if ($post->thumbnail && Storage::disk('public')->exists($post->thumbnail)) {
                Storage::disk('public')->delete($post->thumbnail);
            }

            $fileName = time() . '_' . $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->storeAs('uploads', $fileName, 'public');

            $post->thumbnail = 'uploads/' . $fileName;
        }

        $post->category_id = $request->category_id;
        $post->save();

        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }

        return redirect()->route('admin.post.index')
                         ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        // Delete thumbnail file if exists
        if ($post->thumbnail && Storage::disk('public')->exists($post->thumbnail)) {
            Storage::disk('public')->delete($post->thumbnail);
        }

        $post->delete();

        return redirect()->route('admin.post.index')
                         ->with('success', 'Post deleted successfully.');
    }
}
