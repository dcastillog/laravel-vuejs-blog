<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {   
        $postQty = Post::published()->count();

        return view('admin.dashboard', compact('postQty'));
    }
}
