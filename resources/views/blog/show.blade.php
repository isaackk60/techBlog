@extends('layouts.app')

@section('content')
    <div class="w-4/5 m-auto text-left">
        <div class="sm:grid grid-cols-2 mx-auto py-15 ">
            <h1 class="titleInReadMore">
                {{ $post->title }}
            </h1>

            {{-- /blog/{{ $post->slug }}/dislike --}}
            <div class="sm:flex sm:flex-wrap items-center gap-4 mx-auto">
                <form action="/blog/{{ $post->slug }}/dislike" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <button type="submit"
                        class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-3 px-6 rounded-3xl">
                        <i class="fas fa-thumbs-down"></i>
                    </button>
                </form>
                <div class="loveOnSlugs"> ♥ {{ $post->like }}</div>
                <form action="/blog/{{ $post->slug }}/like" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <button type="submit"
                        class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-3 px-6 rounded-3xl">
                        <i class="fas fa-thumbs-up"></i>
                    </button>
                </form>
                <div>
                </div>
            </div>
        </div>

        {{-- // can try to use class="w-4/5 m-auto" ---they are same meaning --}}
        <div class="imageInReadMore">
            <div>
                <img src="{{ asset('images/' . $post->image_path) }}" alt="">
            </div>
        </div>
        <div class="w-4/5 m-auto pt-10">
            <span class="text-gray-500">
                By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on
                {{ date('jS M Y', strtotime($post->updated_at)) }}
            </span>

            {{-- <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light"> --}}
                {{-- {{ $post->description }} --}}
                {{-- {!! nl2br(e($post->description)) !!} --}}
                @foreach (explode("\n", $post->description) as $paragraph)
                    <p class="text-xl text-gray-700 pt-8 leading-8 font-light">{{ $paragraph }}</p>
                @endforeach
            {{-- </p> --}}
        </div>
        @if (isset(Auth::user()->id))
            {{-- <form 
action="{{ route('posts.updateLike', $post->slug) }}"

        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input 
            type="text"
            name="like"
            value="{{ $post->like }}"
            class="px-2 bg-transparent block border-b-2 w-full h-20 text-5xl outline-none">

        <button    
            type="submit"
            class="uppercase mt-12 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Update Post
        </button>
    </form> --}}
        @endif
    @endsection
