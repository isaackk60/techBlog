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

    @if ($errors->any())
        <div class="w-4/5 m-auto mt-10 pl-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4 px-5">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="sm:grid grid-cols-2 gap-10 w-5/6 mx-auto pt-15 ">

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
    <div class="w-4/5 m-auto about-background-color mb-20 rounded">
        <form action="{{ route('questions.store') }}" method="POST" class="px-6 space-y-6 sm:px-10 sm:space-y-8">
            @csrf
            <h2 class="text-center text-3xl font-semibold text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">Contact Form</h2>
            <div class="flex flex-col">
                @if (!auth()->check())
                    <div class="flex flex-col">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">Name:</label>
                        <input type="text" name="name" id="name" placeholder="Name" class="form-input w-full mb-8">
                    </div>
                    <div class="flex flex-col">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">Email:</label>
                        <input type="email" name="email" id="email" placeholder="Email" class="form-input w-full mb-8">
                    </div>
                @endif
                <div class="flex flex-col">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">Title:</label>
                    <input type="text" name="title" id="title" placeholder="Title" class="form-input w-full mb-8">
                </div>
                <div class="flex flex-col">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">Description:</label>
                    <textarea name="description" id="description" placeholder="What can we help with?" class="form-textarea w-full mb-8"></textarea>
                </div>
                <button type="submit" class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 button-color sm:py-4 mb-8">Submit</button>
            </div>
        </form>
    </div>
@endsection
