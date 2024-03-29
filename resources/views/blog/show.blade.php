@extends('layouts.app')

@section('content')
    @if (session()->has('message'))
        <div class="w-4/5 m-auto mt-10 pl-2">
            <p class="px-5 w-2/6 text-gray-50 bg-green-500 rounded-2xl py-4">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif

    <div class="w-4/5 m-auto text-left">
        <div class="sm:grid grid-cols-2 mx-auto pt-15 pb-7 ">
            <h1 class="titleInReadMore">
                {{ $post->title }}
            </h1>

            {{-- /blog/{{ $post->slug }}/dislike --}}
            <div class="sm:flex sm:flex-wrap items-center gap-4 mx-auto">
                {{-- <form action="/blog/{{ $post->slug }}/dislike" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <button type="submit"
                        class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-3 px-6 rounded-3xl">
                        <i class="fas fa-thumbs-down"></i>
                    </button>
                </form> --}}
                <div class="loveOnSlugs"> ♥ {{ $post->like }}</div>
                <form id="likeForm" action="/blog/{{ $post->slug }}/like" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @if (Auth::check() && $post->likedByUser(Auth::user()))
                        <button id="likeButton" type="submit"
                            class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-3 px-6 rounded-3xl">
                            <i class="fas fa-thumbs-up"></i>
                        </button>
                    @else
                        <button id="likeButton" type="submit"
                            class="uppercase bg-gray-500 text-gray-100 text-lg font-extrabold py-3 px-6 rounded-3xl">
                            <i class="fas fa-thumbs-up"></i>
                        </button>
                    @endif
                </form>
                <div>
                </div>
            </div>
        </div>
        <div>
            <h2 class="text-2xl font-semibold pb-7 text-gray-600">
                {{ $post->subtitle }}
            </h2>
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
                @if (!empty(trim($paragraph)))
                    <p class="text-xl text-gray-700 pt-8 leading-8 font-normal">{{ $paragraph }}</p>
                @endif
            @endforeach
            {{-- </p> --}}
        </div>


    </div>
    <div class="about-background-color">
        <div class="w-4/5 m-auto text-left py-7 mt-14">
            <div class="w-4/5 m-auto mb-7">
                <h2 class="text-3xl font-semibold">Comments</h2>

                @foreach ($post->comments as $comment)
                    {{-- ->take(3) if need --}}
                    <div class="comment-container">
                        <p class="editCommentContent text-xl text-gray-700 pt-8 leading-8 font-normal pb-2">
                            {{ $comment->content }}</p>

                        <form action="{{ route('comments.update', $comment->id) }}" method="POST"
                            class="hidden inputEditCommentForm ">
                            @csrf
                            @method('PUT')
                            <textarea name="content" placeholder="Add a Comment..."
                                class="inputEditComment p-2 leading-7 bg-transparent block border-2 w-full h-20 text-xl outline-none my-9 bg-gray-100">{{ $comment->content }}</textarea>
                            <button type="submit"
                                class="editCommentButton uppercase button-color text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">Save</button>
                            <button id="cancelButton" name="cancelButton"
                                class="uppercase cancel-button-color text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">Cancel</button>
                        </form>

                        <div class="sm:flex sm:h-10 sm:flex-row sm:items-center sm:justify-between">
                            <div class="commentTime text-gray-500">
                                By <span class="font-bold italic text-gray-800">{{ $comment->user->name }}</span>,
                                Commented on
                                {{ date('jS M Y', strtotime($comment->updated_at)) }}
                            </div>

                            @if (Auth::check() && $comment->user_id === Auth::id())
                                <div class="editButtonContainer sm:flex sm:h-10 sm:flex-row sm:items-center sm:justify-between">
                                    <button
                                        class="editButton text-white mr-3 edit-button-color px-3 py-2.5 rounded">Edit</button>

                                    <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-white delete-button-color p-3 rounded">Delete</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
                @if ($post->comments->isEmpty())
                    <div class="mx-auto py-5">
                        <h3 class="text-2xl font-medium text-center">There are no comments yet</h3>
                    </div>
                @endif

                @if (Auth::check())
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <textarea id="commentContent" name="content" placeholder="Add a Comment..."
                            class="p-2 leading-7 bg-transparent block border-2 w-full h-20 text-xl outline-none mt-9 mb-5 bg-gray-100"></textarea>
                        <button id="commentButton" type="submit"
                            class="uppercase button-color text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl mb-4 hidden">Comment</button>
                    </form>
                @endif
            </div>
        </div>
    </div>



    {{-- @if (isset(Auth::user()->id)) --}}
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
    {{-- @endif --}}

    <script>
        const likeForm = document.getElementById('likeForm');
        const likeButton = document.getElementById('likeButton');
        const commentContent = document.getElementById('commentContent');
        const commentButton = document.getElementById('commentButton');

        const cancelButtons = document.querySelectorAll('.cancelButton');
        const editButtons = document.querySelectorAll('.editButton');


        editButtons.forEach(editButton => {
            editButton.addEventListener('click', function(event) {
                const commentContainer = event.target.closest('.comment-container');
                const commentContent = commentContainer.querySelector('.editCommentContent');
                const editForm = commentContainer.querySelector('.inputEditCommentForm');
                const commentTimes = commentContainer.querySelector('.commentTime');
                const editButtonContainer=commentContainer.querySelector('.editButtonContainer');

                commentContent.style.display = 'none';
                commentTimes.style.display = 'none';
                editForm.style.display = 'block';
                editButtonContainer.style.display = 'none';
            });
        });


        cancelButtons.forEach(cancelButton => {
            cancelButton.addEventListener('click', function(event) {
                const commentContainer = event.target.closest('.comment-container');
                const commentContent = commentContainer.querySelector('.editCommentContent');
                const editForm = commentContainer.querySelector('.inputEditCommentForm');
                const commentTimes = commentContainer.querySelector('.commentTime');
                const editButtonContainer=commentContainer.querySelector('.editButtonContainer');

                commentContent.style.display = 'block';
                commentTimes.style.display = 'block';
                editForm.style.display = 'none';
                editButtonContainer.style.display = 'block';
            });
        });


        likeForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const actionUrl = likeButton.classList.contains('liked') ? '/blog/{{ $post->slug }}/dislike' :
                '/blog/{{ $post->slug }}/like';

            likeForm.action = actionUrl;

            likeForm.submit();
        });

        likeButton.addEventListener('click', function() {
            likeButton.classList.toggle('liked');
        });

        commentContent.addEventListener('input', () => {
            if (commentContent.value.trim() === "") {
                commentButton.disabled = true;
                if (!commentButton.classList.contains('hidden')) {
                    commentButton.classList.add('hidden');
                }

            } else {
                commentButton.disabled = false;
                commentButton.classList.remove('hidden');
            }
        });
    </script>
@endsection
