@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Blog Posts
        </h1>
    </div>
</div>

@if (session()->has('message'))
    <div class="w-4/5 m-auto mt-10 pl-2">
        <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
            {{ session()->get('message') }}
        </p>
    </div>
@endif

@if (Auth::check())
    <div class="pt-15 w-4/5 m-auto">
        <a 
            href="/blog/create"
            class="bg-blue-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
            Create post
        </a>
    </div>
@endif

<div class="w-4/5 mx-auto pt-15">
    <form action="{{ route('blog.index') }}" method="GET">
        <label>Sort by</label>
        <select name="sort" onchange="this.form.submit()" class="bg-gray-100 uppercase text-black-100 text-xs font-extrabold py-3 px-4 border-2 border-gray-950 ml-2">
            <option value="like" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'like') echo 'selected'; ?>>Like</option>
            <option value="updated_at" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'updated_at') echo 'selected'; ?>>Latest</option>
        </select>
    </form>
</div>

@foreach ($posts as $post)
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div class="image-padding">
            <img src="{{ asset('images/' . $post->image_path) }}" alt="">
        </div>
        <div>
            <h2 class="text-gray-700 font-bold text-5xl pb-4">
                {{ $post->title }}
            </h2>

            <span class="text-gray-500">
                By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
            </span>

            {{-- <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                {{ $post->description }}
            </p> --}}
            <?php
            $wordCount = str_word_count($post->description);
            
            if ($wordCount > 40) {
                $words = explode(" ", $post->description);
                $shortDescription = implode(" ", array_slice($words, 0, 40));
                $shortDescription .= "...";
            } else {
                $shortDescription = $post->description;
            }
            
            echo "<p class='text-base text-gray-700 pt-2 pb-10 leading-6 font-light'>$shortDescription</p>";
            ?>
            

            <a href="/blog/{{ $post->slug }}" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                Keep Reading
            </a>

            @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                <span class="float-right">
                    <a 
                        href="/blog/{{ $post->slug }}/edit"
                        class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                        Edit
                    </a>
                </span>

                <span class="float-right">
                     <form 
                        action="/blog/{{ $post->slug }}"
                        method="POST">
                        @csrf
                        @method('delete')

                        <button
                            class="text-red-500 pr-3"
                            type="submit">
                            Delete
                        </button>

                    </form>
                </span>
            @endif
        </div>
    </div>    
@endforeach

@endsection