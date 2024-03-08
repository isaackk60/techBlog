<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PagesController extends Controller
{
    public function index()
    {
        return view('index')
        ->with('posts', Post::orderBy('updated_at', 'DESC')->get());
    }

    public function show($slug)
    {
        return view('blog.show')
            ->with('post', Post::where('slug', $slug)->first());
    }

    public function about(){
        return view('about');
    }
}
