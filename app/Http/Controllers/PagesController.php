<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $posts = Post::published()->paginate();

        if(request()->wantsJson()) // Verifica si el request requiere de una respuesta JSON, es decir proviene de AJAX
        {
            return $posts;
        }

        return view('pages.home', compact('posts'));
    }

    // SPA Page with VueJS
    public function spa()
    {
        return view('pages.spa');
    }
}
