<?php

namespace App\Http\Controllers\Admin;

use App\Models\Photo;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class PhotoController extends Controller
{
    public function store(Post $post)
    {
        $this->validate(request(), [
            'photo' => 'required|image|max:2048'
        ]);
           
        // Crea la foto con el id del post correspondiente
        $post->photos()->create([
            'url' => Storage::url(request()->file('photo')->store('posts','public')),
        ]);
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();

        return back()->with('flash','Foto eliminada');
    }
}
