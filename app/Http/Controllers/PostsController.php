<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('blog.index')
    //         ->with('posts', Post::orderBy('updated_at', 'DESC')->get());
    // }

    public function index(Request $request)
{
    $query = Post::query();


    if ($request->has('sort')) {
        $sortField = $request->sort;
        if ($sortField == 'like') {
            $query->orderBy('like', 'DESC');
        } elseif ($sortField == 'updated_at') {
            $query->orderBy('updated_at', 'DESC');
        }
    } 
    // else {//default
    //     $query->orderBy('updated_at', 'DESC');
    // }

    return view('blog.index')->with('posts', $query->get());
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id

            //,'like'=>0
        ]);

        return redirect('/blog')
            ->with('message', 'Your post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('blog.show')
            ->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('blog.edit')
            ->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Post::where('slug', $slug)
            ->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
                'user_id' => auth()->user()->id,
            ]);

        return redirect('/blog')
            ->with('message', 'Your post has been updated!');
    }

    public function updateLike($slug)
    {
        $post = Post::where('slug', $slug)->first();


        $originalUpdatedAt = $post->updated_at;

        $post->like += 1;
        $post->save();

        // Restore the original updated_at timestamp
        $post->forceFill(['updated_at' => $originalUpdatedAt])->save();

        return back();

    }
    public function updateDisLike($slug)
    {
        $post = Post::where('slug', $slug)->first();


        $originalUpdatedAt = $post->updated_at;

        $post->like -= 1;
        $post->save();

        // Restore the original updated_at timestamp
        $post->forceFill(['updated_at' => $originalUpdatedAt])->save();

        return back();

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug);
        $post->delete();

        return redirect('/blog')
            ->with('message', 'Your post has been deleted!');
    }
}

