@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl uppercase text-blue-800 font-semibold">
            Contact Us
        </h1>
    </div>
</div>

<div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto pt-15 border-t border-gray-200">
                
    <div class="flex flex-col justify-center">
        
    <p class="text-lg text-gray-700 leading-relaxed mb-6">Welcome to TechNewsWorld's Contact Us page. We're delighted to hear from you! Whether you have a question, suggestion, or just want to say hello, feel free to reach out to us using the form below. Our team is committed to providing you with the best possible experience and will respond to your inquiry as soon as possible.</p>

<ul class="list-disc pl-6">
    <li class="text-gray-700">Address: 123 Tech Street, Techville, TX 12345</li>
    <li class="text-gray-700">Phone: +1 (123) 456-7890</li>
    <li class="text-gray-700">Email: info@technewsworld.com</li>
</ul>
    </div>
    <div class="image-padding">
        <img src="https://ats.org/wp-content/uploads/2020/04/Index-High-Tech-Future.jpg" alt="">
    </div>
</div>


@endsection