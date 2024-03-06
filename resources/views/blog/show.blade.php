@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="titleInReadMore">
            {{ $post->title }}
        </h1>
        <div class="loveOnSlugs"> ♥ {{ $post->like }}</div>
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
        By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
    </span>

    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{ $post->description }}
    </p>
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
    <div>{{$post->like}}</div>
    <form 
    action="{{ route('posts.updateLike', $post->slug) }}"
    method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <button type="submit" class="uppercase mt-12 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
        Like
    </button>
</form>

<form 
action="{{ route('posts.dislike', $post->slug) }}"
method="POST"
enctype="multipart/form-data">
@csrf
@method('PUT')
<button type="submit" class="uppercase mt-12 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
    Dislike
</button>
</form>
    @endif

@endsection 