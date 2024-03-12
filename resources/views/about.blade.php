@extends('layouts.app')

@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl uppercase text-blue-800 font-semibold">
                About Us
            </h1>
        </div>
    </div>
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div class="image-padding">
            <img src="https://www.simplilearn.com/ice9/free_resources_article_thumb/What_is_the_Importance_of_Technology.jpg"
                alt="">
        </div>
        <div class="flex flex-col justify-center">
            <p class="text-lg font-medium text-gray-700 leading-relaxed mb-6">Welcome to TechNewsWorld, your go-to source for
                the latest in technology news, trends, and insights from around the globe. At TechNewsWorld, we strive to
                provide you with timely and accurate information about the ever-evolving world of technology.</p>
        </div>
    </div>

    <div class="mx-auto py-12 px-4 about-background-color">
        <div class="max-w-2xl mx-auto">
            <h2 class="text-3xl pb-3 font-semibold mb-4">Our Mission</h2>
            <p class="text-lg text-gray-700 leading-relaxed mb-6">Our mission at TechNewsWorld is to keep you informed about
                the latest developments in technology, including:</p>
            <ul class="list-disc pl-6 mb-6">
                <li class="text-gray-700 leading-normal text-base font-normal">Breaking news in the tech industry</li>
                <li class="text-gray-700 leading-normal text-base font-normal">Reviews and analysis of new gadgets and
                    devices</li>
                <li class="text-gray-700 leading-normal text-base font-normal">Updates on software releases and updates</li>
                <li class="text-gray-700 leading-normal text-base font-normal">Insights into emerging technologies such as
                    AI, blockchain, and IoT</li>
                <li class="text-gray-700 leading-normal text-base font-normal">Interviews with industry experts and thought
                    leaders</li>
            </ul>

            <h2 class="text-3xl pt-5 pb-3 font-semibold mb-4">Why Choose TechNewsWorld?</h2>
            <p class="text-lg text-gray-700 leading-relaxed mb-6">TechNewsWorld stands out from the crowd for several
                reasons:</p>
            <ul class="list-disc pl-6 mb-6">
                <li class="text-gray-700 leading-normal text-base font-normal">Timely Updates: We pride ourselves on
                    delivering the latest news and updates as soon as they happen, ensuring you stay ahead of the curve.
                </li>
                <li class="text-gray-700 leading-normal text-base font-normal">Expert Analysis: Our team of experienced
                    writers and tech enthusiasts provides insightful analysis and commentary on the biggest tech stories of
                    the day.</li>
                <li class="text-gray-700 leading-normal text-base font-normal">Diverse Coverage: Whether you're interested
                    in smartphones, computers, artificial intelligence, or the latest developments in space technology,
                    TechNewsWorld has you covered.</li>
                <li class="text-gray-700 leading-normal text-base font-normal">Community Engagement: We value our readers'
                    input and encourage community engagement through comments, discussions, and feedback on our articles.
                </li>
            </ul>

        </div>

    </div>
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto pt-15 border-t border-gray-200 mb-20">

        <div class="flex flex-col justify-center">
            <h2 class="text-3xl font-semibold mb-4">Get in Touch</h2>
            <p class="text-lg text-gray-700 leading-relaxed mb-6">Have a tip, suggestion, or inquiry? We'd love to hear from
                you! Feel free to contact us with any questions or feedback. Join our community and stay connected with the
                latest in technology with TechNewsWorld!</p>
            <p class="text-lg text-gray-700 leading-relaxed mb-6">Stay connected with us to stay ahead in the fast-paced
                world of technology!</p>
        </div>
        <div class="image-padding">
            <img src="https://ats.org/wp-content/uploads/2020/04/Index-High-Tech-Future.jpg" alt="">
        </div>
    </div>
@endsection
