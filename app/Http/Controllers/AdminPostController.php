<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
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
        $attr = $this->validatePost();
        try {
            Post::create(array_merge($this->validatePost(),[
                'user_id' => auth()->id(),
                'thumbnail' => request()->file('thumbnail')->store('thumbnails')
            ]));
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
        $attr = $this->validatePost($post);
        if ($attr['thumbnail'] ?? false) {
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

    protected function validatePost(?Post $post = null)
    {
        $post ??= new Post();
        $attr = request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required|image'],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required',Rule::exists('categories','id')]
        ]);
        return $attr;
    }
}
