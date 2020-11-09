<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    // SPA Page with VueJS
    public function spa()
    {
        return view('pages.spa');
    }
}
