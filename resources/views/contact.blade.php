@extends('layouts.app')

@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl uppercase text-blue-800 font-semibold">
                Contact Us
            </h1>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="w-4/5 m-auto mt-10 pl-2">
            <p class="px-5 w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif

    <div class="sm:grid grid-cols-2 gap-10 w-5/6 mx-auto pt-15 mb-20">

        <div class="flex flex-col justify-center">

            <p class="text-lg text-gray-700 leading-relaxed mb-6">Welcome to TechNewsWorld's Contact Us page. We're delighted
                to hear from you! Whether you have a question, suggestion, or just want to say hello, feel free to reach out
                to us using the form below. Our team is committed to providing you with the best possible experience and
                will respond to your inquiry as soon as possible.</p>

            <ul class="list-disc pl-6 mb-6">
                <li class="text-gray-700 leading-normal text-base font-normal">Address: Dublin Rd, Marshes Upper, Dundalk,
                    Co. Louth, A91 K584</li>
                <li class="text-gray-700 leading-normal text-base font-normal">Phone: +353 083 090 4444</li>
                <li class="text-gray-700 leading-normal text-base font-normal">Email: info@technewsworld.com</li>
            </ul>
        </div>
        <div class="image-padding">
            <img src="https://media.istockphoto.com/id/1346125184/photo/group-of-successful-multiethnic-business-team.jpg?s=612x612&w=0&k=20&c=5FHgRQZSZed536rHji6w8o5Hco9JVMRe8bpgTa69hE8="
                alt="">
        </div>
    </div>
    <div>

        <form action="{{ route('questions.store') }}" method="POST">
            @csrf
            <div>
                @if (!auth()->check())
                    <input type="text" name="name" placeholder="Your Name">
                    <input type="email" name="email" placeholder="Your Email">
                @endif
                <input type="text" name="title" placeholder="Title">
                <textarea name="description" placeholder="Description"></textarea>
                <button type="submit">Submit</button>
            </div>
        </form>


    </div>
@endsection
