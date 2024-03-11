@extends('layouts.app')

@section('content')
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-white background-image-text uppercase font-bold text-shadow-md pb-14">
                    Do You Want To Stay Current with New Technology?
                </h1>
                <a href="/blog"
                    class="text-center background-image-button text-gray-700 py-2 px-4 font-bold text-xl uppercase">
                    Read More
                </a>
            </div>
        </div>
    </div>

    {{-- <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="https://cdn.pixabay.com/photo/2014/05/03/01/03/laptop-336704_960_720.jpg" width="700" alt="">
        </div>

        <div class="m-auto sm:m-auto text-left w-4/5 block">
            <h2 class="text-3xl font-extrabold text-gray-600">
                Struggling to be a better web developer?
            </h2>

            <p class="py-8 text-gray-500 text-s">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus.
            </p>

            <p class="font-extrabold text-gray-600 text-s pb-9">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente magnam vero nostrum! Perferendis eos
                molestias porro vero. Vel alias.
            </p>

            <a href="/blog" class="uppercase bg-blue-500 text-gray-100 text-s font-extrabold py-3 px-8 rounded-3xl">
                Find Out More
            </a>
        </div>
    </div> --}}

    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-t border-gray-200">
        <div class="image-padding">
            <img src="https://media.licdn.com/dms/image/D5612AQE1U31GRHLAJw/article-cover_image-shrink_720_1280/0/1704266273331?e=2147483647&v=beta&t=aqDRVpuv66riLVH3V7sAjwQPjR_CBLGhWJVqW7RzuLs"
                alt="">
        </div>
        <div class="flex flex-col justify-center">
            <h2 class="text-3xl font-semibold mb-4">Stay Updated</h2>
            <p class="text-lg font-medium text-gray-700 leading-relaxed mb-6">At TechNewsWorld, we understand the importance
                of staying informed in today's fast-paced digital age. That's why we strive to bring you timely and accurate
                information about the ever-evolving world of technology. From groundbreaking innovations to industry trends
                and analysis, we've got you covered.</p>
        </div>

    </div>

    <div class="text-center p-15 bg-black text-white">
        <h2 class="text-2xl pb-5 text-l">
            Stay Updated with the Latest in Technology
        </h2>

        <span class="font-bold block text-3xl py-2">
            Latest Gadgets Buzz
        </span>
        <span class="font-bold block text-3xl py-2">
            Trendy Tech Trends
        </span>
        <span class="font-bold block text-3xl py-2">
            Expert Insights
        </span>
        <span class="font-bold block text-3xl py-1">
            Software Updates Alert
        </span>
    </div>

    <div class="text-center pt-13">
        <span class="uppercase text-s text-gray-400">
            Latest Tech News
        </span>

        <h2 class="text-4xl font-bold py-10">
            Exciting Tech News Updated!
        </h2>

        <p class="m-auto w-4/5 text-gray-700 leading-relaxed font-medium">
            Stay ahead with our latest articles covering cutting-edge technology, insightful analyses, and exciting
            innovations from the world of tech. Whether you're a tech enthusiast or a professional, our blog delivers
            curated content to keep you informed and inspired.
        </p>
    </div>

    {{-- <div class="sm:grid grid-cols-2 w-4/5 m-auto">
        <div class="flex bg-yellow-700 text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block">
                <span class="uppercase text-xs">
                    PHP
                </span> --}}

    {{-- <h3 class="text-xl font-bold py-10">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas necessitatibus dolorum error culpa
                    laboriosam. Enim voluptas earum repudiandae consequuntur ad? Expedita labore aspernatur facilis quasi
                    ex? Nemo hic placeat et?
                </h3>

                <a href=""
                    class="uppercase bg-transparent border-2 border-gray-100 text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                    Find Out More
                </a>
            </div>
        </div>
        <div>
            <img src="https://cdn.pixabay.com/photo/2014/05/03/01/03/laptop-336704_960_720.jpg" alt="">
        </div>
    </div> --}}
    <div>
        <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
            @for ($i = 0; $i < min(4, count($posts)); $i++)
                @php
                    $post = $posts[$i];
                @endphp

                <div class="flex flex-col justify-center">
                    <a href="/blog/{{ $post->slug }}">
                        {{-- <div class="image-padding">
                <img src="{{ asset('images/' . $post->image_path) }}" alt="">
            </div>
            <div class="topicContainer">
                <h2 class="topicInMain">
                    {{ $post->title }}
                </h2>
            </div> --}}
                        {{-- <div class="sm:flex sm:flex-col w-4/5 mx-auto py-15"> --}}

                        <div class="image-padding">
                            <img src="{{ asset('images/' . $post->image_path) }}" alt="">
                        </div>
                        <div>
                            <h2 class="text-gray-700 font-bold text-2xl pb-4">
                                {{ $post->title }}
                            </h2>
                            <?php
                            $wordCount = str_word_count($post->description);
                            
                            if ($wordCount > 30) {
                                $words = explode(' ', $post->description);
                                $shortDescription = implode(' ', array_slice($words, 0, 40));
                                $shortDescription .= ' ...';
                            } else {
                                $shortDescription = $post->description;
                            }
                            
                            echo "<p class='text-base text-gray-700 pt-2 pb-10 leading-6'>$shortDescription</p>";
                            ?>
                    </a>
                </div>
        </div>
        @endfor
    </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>//stackflow
    var images = [
        'https://images.unsplash.com/photo-1497493292307-31c376b6e479?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fHRlY2glMjBibG9nfGVufDB8fDB8fHww',
        'https://media.istockphoto.com/id/1494104649/photo/ai-chatbot-artificial-intelligence-digital-concept.jpg?s=612x612&w=0&k=20&c=1Zq2sj3W0tWcpc-n1fVt4dQQOBGhtwcAk1H2eQ5MAbI=',
        'https://hugagency.com/folder/cases/tesla-user-interface.jpg'
    ];
    var nextimage = 0;

    var preloadedImages = [];
    images.forEach(function(imageUrl) {
        var img = new Image();
        img.src = imageUrl;
        preloadedImages.push(img);
    });

    function changeBackground() {
        if (nextimage >= images.length) { nextimage = 0; }
        $('.background-image').css('background-image', 'linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.8)), url("' + images[nextimage++] + '")');
        setTimeout(changeBackground, 4500);
    }

    changeBackground();
</script>