<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        
        $posts = Post::allowed()->get(); // Scope allowed(): muestra los permitidos por el usuario actual

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories','tags'));
    }

    public function store(Request $request)
    {        
        $this->authorize('create', new Post);
        
        $this->validate($request,[
            'title' => 'required',
        ]);

        $post = Post::create( $request->all() );        
        
        return redirect()->route('admin.posts.edit', $post);
    }

    public function update(Post $post, StorePostRequest $request)
    { 
        // $post->title = $request->title;
        // $post->body = $request->body;
        // $post->iframe = $request->iframe;
        // $post->excerpt = $request->excerpt;
        // $post->published_at = $request->published_at;
        // $post->category_id = $request->category_id;
        // $post->save();
        
        $this->authorize('update', $post);

        $post->update($request->except('tags'));

        $post->syncTags($request->tags);

        return redirect()->route('admin.posts.edit', $post)->with('flash', 'Tu publicación ha sido guardada');
    }

    public function edit(Post $post)
    {
        $this->authorize('view', $post);
    
        return view('admin.posts.edit',[
            'post' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        
        $post->delete();

        return redirect()->route('admin.posts.index', $post)->with('flash', 'Tu publicación ha sido eliminada');
    }
}
