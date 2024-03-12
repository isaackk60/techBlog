<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'viewSearch', 'search']]);
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
            }elseif ($sortField == 'updated_at_asc') {
                $query->orderBy('updated_at', 'ASC');
            }elseif( $sortField == 'like_asc') {
                $query->orderBy('like', 'ASC');
            }
        } else {//default
            $query->orderBy('updated_at', 'DESC');
        }

        return view('blog.index')->with('posts', $query->get());
    }

    public function viewSearch()
    {
        return view('blog.viewSearch')
            ->with('posts', Post::orderBy('like', 'DESC')->get());
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $posts = Post::where('title', 'like', "%$query%")->orderBy('like', 'DESC')->get();
        } else {
            $posts = Post::orderBy('like', 'DESC')->get();
        }

        return view('blog.viewSearch', compact('posts'));
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
            'subtitle' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        Post::create([
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
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
            'subtitle' => 'required',
            'description' => 'required',
        ]);

        Post::where('slug', $slug)
            ->update([
                    'title' => $request->input('title'),
                    'subtitle' => $request->input('subtitle'),
                    'description' => $request->input('description'),
                    'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
                    'user_id' => auth()->user()->id,
                ]);

        return redirect('/blog')
            ->with('message', 'Your post has been updated!');
    }

    // public function updateLike($slug)
    // {
    //     $post = Post::where('slug', $slug)->first();


    //     $originalUpdatedAt = $post->updated_at;

    //     $post->like += 1;
    //     $post->save();

    //     // Restore the original updated_at timestamp
    //     $post->forceFill(['updated_at' => $originalUpdatedAt])->save();

    //     return back();

    // }
    // public function updateDisLike($slug)
    // {
    //     $post = Post::where('slug', $slug)->first();


    //     $originalUpdatedAt = $post->updated_at;

    //     $post->like -= 1;
    //     $post->save();

    //     // Restore the original updated_at timestamp
    //     $post->forceFill(['updated_at' => $originalUpdatedAt])->save();

    //     return back();

    // }

    public function updateLike(Request $request, $slug)
    {
        $user = auth()->user();
        $post = Post::where('slug', $slug)->firstOrFail();
        $originalUpdatedAt = $post->updated_at;
        $isLiked = $user->likes()->where('post_id', $post->id)->exists();

        if ($isLiked) {
            $user->likes()->detach($post->id);
            $post->like -= 1;
        } else {
            $user->likes()->attach($post->id);
            $post->like += 1;
        }

        $post->save();
        $post->forceFill(['updated_at' => $originalUpdatedAt])->save();

        return back();
    }

    public function updateDislike(Request $request, $slug)
    {
        $user = auth()->user();
        $post = Post::where('slug', $slug)->firstOrFail();
        $originalUpdatedAt = $post->updated_at;
        $isLikedOrDisliked = $user->likes()->where('post_id', $post->id)->exists();

        if ($isLikedOrDisliked) {
            $user->likes()->detach($post->id);
            $post->like -= 1;
        } else {
            $user->likes()->attach($post->id);
            $post->like += 1;
        }

        $post->save();
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

