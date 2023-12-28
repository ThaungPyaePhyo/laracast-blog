<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;

class PostController extends Controller
{

    public function index()
    {
        return view('posts.index',[
            'posts' => Post::latest()->filter(request(['search','category','author']))->paginate(6)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show',[
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('posts.create');
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

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

}
