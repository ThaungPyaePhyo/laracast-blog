<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index',[
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $attr = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required',Rule::exists('categories','id')]
        ]);

        $attr['user_id'] = auth()->id();
        $attr['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        try {
            Post::create($attr);
        } catch (\Exception $e) {
            dd($e);
        }

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit',[
            'post' => $post
        ]);
    }

    public function update(Post $post)
    {
        $attr = request()->validate([
            'title' => 'required',
            'thumbnail' => 'image',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required',Rule::exists('categories','id')]
        ]);

        if (isset($attr['thumbnail'])) {
            $attr['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }
       $post->update($attr);

        return back()->with('success','Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success','Post Deleted!');
    }
}
