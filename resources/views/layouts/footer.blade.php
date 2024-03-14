<footer class="footer-detail pt-16 pb-5 ">
    @guest
        <div class="sm:grid grid-cols-7 w-4/5 pb-5 m-auto text-center">
            {{-- <div> --}}
            {{-- <h3 class="text-lg sm:font-bold text-gray-100">
                Pages
            </h3> --}}

            {{-- <ul class="py-4 sm:text-s pt-4 footer-color">
                <li class="pb-1">
                    <a href="/">
                        Home
                    </a>
                </li>
                <li class="pb-1">
                    <a href="/blog">
                        Blog
                    </a>
                </li>
                <li class="pb-1">
                    <a href="/login">
                        Login
                    </a>
                </li>
                <li class="pb-1">
                    <a href="/register">
                        Register
                    </a>
                </li>
            </ul>
        </div> --}}
            <div class="text-lg sm:font-bold text-gray-100 footer-color">
                <a href="/">
                    Home
                </a>
            </div>
            <div class="text-lg sm:font-bold text-gray-100 footer-color">
                <a href="blog">
                    Blog
                </a>
            </div>
            <div class="text-lg sm:font-bold text-gray-100 footer-color">
                <a href="/blog/viewSearch">
                    Search
                </a>
            </div>
            <div class="text-lg sm:font-bold text-gray-100 footer-color">
                <a href="/about">
                    About Us
                </a>
            </div>
            <div class="text-lg sm:font-bold text-gray-100 footer-color">
                <a href="/contact">
                    Contact Us
                </a>
            </div>
            <div class="text-lg sm:font-bold text-gray-100 footer-color">
                <a href="/login">
                    Login
                </a>
            </div>
            <div class="text-lg sm:font-bold text-gray-100 footer-color">
                <a href="/register">
                    Register
                </a>
            </div>

            {{-- <div>
            <h3 class="text-lg sm:font-bold text-gray-100">
                Find Us
            </h3>
            

            <ul class="py-4 sm:text-s pt-4 footer-color">
                <li class="pb-1">
                    <a href="/">
                        What we do
                    </a>
                </li>
                <li class="pb-1">
                    <a href="/">
                        Address
                    </a>
                </li>
                <li class="pb-1">
                    <a href="/">
                        Phone
                    </a>
                </li>
                <li class="pb-1">
                    <a href="/">
                        Contact
                    </a>
                </li>
            </ul>
        </div>

        <div>
            <h3 class="text-lg sm:font-bold text-gray-100">
                Latest posts
            </h3>

            <ul class="py-4 sm:text-s pt-4 footer-color">
                <li class="pb-1">
                    <a href="/">
                        Why we love tech
                    </a>
                </li>
                <li class="pb-1">
                    <a href="/">
                        Why we love design
                    </a>
                </li>
                <li class="pb-1">
                    <a href="/">
                        Why to use Laravel
                    </a>
                </li>
                <li class="pb-1">
                    <a href="/">
                        Why PHP is the best
                    </a>
                </li>
            </ul>
        </div> --}}
        </div>
    @else
        <div class="sm:grid grid-cols-6 w-4/5 pb-5 m-auto text-center">
            <div class="text-lg sm:font-bold text-gray-100 footer-color">
                <a href="/">
                    Home
                </a>
            </div>
            <div class="text-lg sm:font-bold text-gray-100 footer-color">
                <a href="blog">
                    Blog
                </a>
            </div>
            <div class="text-lg sm:font-bold text-gray-100 footer-color">
                <a href="/blog/viewSearch">
                    Search
                </a>
            </div>
            <div class="text-lg sm:font-bold text-gray-100 footer-color">
                <a href="/about">
                    About Us
                </a>
            </div>
            <div class="text-lg sm:font-bold text-gray-100 footer-color">
                <a href="/contact">
                    Contact Us
                </a>
            </div>
            <div class="text-lg sm:font-bold text-gray-100 footer-color">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    @endguest
    <div
        class='sm:grid grid-cols-4 w-4/5 pt-10 pb-16 m-auto text-center border-b border-gray-900 text-3xl social-icons'>
        <div>
            <a href="#">
                <i class="fab fa-facebook-square text-gray-100"></i>
            </a>
        </div>
        <div>
            <a href="#">
                <i class="fab fa-instagram-square text-gray-100"></i>
            </a>
        </div>
        <div>
            <a href="#">
                <i class="fab fa-pinterest-square text-gray-100"></i>
            </a>
        </div>
        <div>
            <a href="#">
                <i class="fab fa-youtube-square text-gray-100"></i>
            </a>
        </div>
    </div>

    <p class="w-25 w-4/5 pb-3 m-auto text-xs text-gray-100 pt-6">
        Copyright 2017-2021 Code With Dary. Copyright 2024 TechNewsWorld Code With Kim Fui Leung. All Rights Reserved
    </p>
</footer>
