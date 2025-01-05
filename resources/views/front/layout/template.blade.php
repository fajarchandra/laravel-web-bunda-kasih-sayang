<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    {{-- <meta name="description" content="" /> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="ALMAR Developer" />
    @stack('meta-seo')
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{asset('front/img/logo/Logo-Love-putih.png')}}" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('front/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/css/custom.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    @stack('css')
</head>

<body>

    @include('front.layout.navbar')

    {{-- <div class="mb-3 text-center mt-5">
        <a href="{{ $config['ads_header'] }}">
            <img src="{{ $config['ads_header'] }}" alt="ads_widget" class="img-fluid" weight="80%"> --}}
            {{-- <img src="{!! $config['ads_widget'] !!}" alt="ads_widget" class="img-fluid" weight="80%"> --}}
        {{-- </a>
    </div> --}}

    @yield('content')

    {{-- contact --}}
    <section class="contact" id="contact">
        <div class="container-contact">
            <div class="contact-img">
                <img src="{{ asset('front/img/contact/img-contact.png') }}" alt="">
            </div>
            <div class="contact-header">
                <h1>Mari tebarkan kebaikan dan Kasih sayang</h1>
                <h2>Gabung bersama group kami untuk mendapatkan informasi, e-book gratis, hingga pelatihan-pelatihan
                    gratis
                    lainnya.</h2>
            </div>
            <div class="contact-form">
                {{-- <form action="#">
                    <!-- <label for="exampleFormControlInput1" class="form-label"></label> -->
                    <input type="text" class="form-control mb-2" id="exampleFormControlInput1" placeholder="Name">
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email">
                </form> --}}
            </div>
            <div class="contact-btn">
                <button><a href="{{ url('/register') }}">Join</a></button>
                <span>Atau via</span>
                <button><a href="https://wa.me/{{ $config['phone'] }}" target="_blank">WA Group</a></button>
            </div>
        </div>
    </section>

    {{-- footer --}}
    <section class="footer" id="footer">
        <div class="container-footer">
            <div class="footer-logo">
                <img src="{{ asset('front/img/logo/Logo-name-pink.png') }}" alt="logo-bundakasihsayang">
            </div>
            <div class="footer-title">
                <div class="footer-caption">
                    <h2>Kebaikan dimulai dari Kasih Sayang</h2>
                </div>
                <div class="footer-sosmed">
                    <h2>Yuk Lebih dekat</h2>
                    <a href="https://www.facebook.com/{{ $config['facebook'] }}"><i
                            class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/{{ $config['instagram'] }}"><i
                        class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.tiktok.com/"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="https://www.youtube.com/{{ $config['youtube'] }}"><i
                        class="fa-brands fa-youtube"></i></a>
                    <h2>sitifarida.official</h2>
                </div>
                <div class="footer-wa">
                    <h2>Yuk Bahas Ide dan Gagasan</h2>
                    <a href="https://wa.me/{{ $config['phone'] }}" target="_blank"><i class="fa-brands fa-whatsapp"></i>+628516878744</a>
                </div>
            </div>
            <div class="footer-other">
                <h2>Kunjungi Lainnya</h2>
                <a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a>
                <a href="{{ url('/about') }}" class="{{ Request::is('about') ? 'active' : '' }}">Profile</a>
                <a href="{{ url('/articles') }}" class="{{ Request::is('articles') ? 'active' : '' }}">Article</a>
                {{-- <a href="{{ url('/all-category') }}" class="{{ Request::is('all-category') ? 'active' : '' }}">Categories</a> --}}
                <a href="{{ url('/contact') }}" class="{{ Request::is('contact') ? 'active' : '' }}">Contact</a>
            </div>
        </div>
    </section>
    <section class="footer-bottom">
        <div class="footer-bottom-text">
            <h2>@bundakasihsayang {{ date('Y') }} | Get In Touch | Legal</h2>
        </div>
    </section>
    <!-- js code -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script> -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <script src="js/script.js"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('front/js/scripts.js') }}"></script>
    {{-- AOS --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    @stack('js')
</body>

</html>
