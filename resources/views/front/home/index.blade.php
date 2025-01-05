@extends('front.layout.template')

@section('title', 'Articles - Almar Dev')
<!-- Page content-->
@section('content')

    {{-- jumbotron --}}
    <section class="jumbotron" id="jumbotron">
        <div class="jumbotron-caption">
            <h2>Kebaikan <br>dimulai dari
                <br>Kasih Sayang
            </h2>
        </div>
    </section>

    {{-- Animasi Berputar --}}
    <section class="logo-animasi">
        <div class="container">
            <img class="logo-rotate" src="{{ asset('front/img/logo/Logo-name-white.png') }}" alt="">
            <img class="logo-tengah" src="{{ asset('front/img/logo/Logo-Love-putih.png') }}" alt="">
        </div>
    </section>


    {{-- halaman about --}}
    <section class="about" id="about">
        <div class="container-about">
            <div class="col text-center mt-3">
                <h2 data-aos="fade-right">Saya,adalah seorang pembisnis,
                    Pembicara, Pendidik, Pemimpi, Istri dan Ibu.
                </h2>
                <h3 data-aos="fade-left">Eits, Sebentar masih ada nih penjelasan tentang saya. Seorang dalang
                    pendidikan mandiri, aktivis kesehatan, penyemangat anak muda, terobsesi dengan ketahanan pangan
                    orang yang
                    keras kepala, berprestasi dan individualis, seorang koki di kota kecil untuk keluara kecil saya.
                    <br>
                    <br>
                    Yah itulah kegiatan saya, dari semua kegiatan tersebuat tujuan saya satu, yaitu menebar kebaikan
                    dengan rasa
                    kasih sayang.
                </h3>
            </div>
            <!-- <div class="col-sm-8 offset-2 mb-2 text-center"> -->
            <button><a href="{{ url('/about') }}">Suka dengan kisahnya? Lihat yang lebih menarik lagi</a>
            </button>
        </div>
    </section>

    {{-- Galery --}}
    <section class="galeri" id="galeri">
        <div class="container">
            <div class="row">
                <div class="col-sm-6" data-aos="fade-right">
                    <h1>Kepo Dengan Kegiatan dan Programnya ?</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6" data-aos="fade-right">
                    <p>Banyak Kegiatan dan Program perkembangan lainnya. Yuk bahas idenya </p>
                </div>
            </div>
            <button><a href="{{ url('/contact') }}">Pengen E-Book gratis?Klik disini</a></button>
        </div>
    </section>

    {{-- article --}}   
    <section class="article" id="article">
        <div class="container-title-article">
            <div class="col-sm-12 mt-3">
                <h2 class="text-center">Kasih Sayang <br> Blitz Blog</h2>
            </div>
        </div>
        <div class="container-article">
            <div class="main-article text-center" data-aos="fade-up">
                <a href="{{ url('p/' . $latest_post->slug) }}">
                    <img class="card-img-top featured-img" src="{{ asset('storage/back/' . $latest_post->img) }}"
                        alt="..." /></a>
                <div class="main-article-description">
                    <p>
                    <div class="small text-muted">{{ $latest_post->created_at->format('m-d-Y') }}
                        | {{ $latest_post->User->name }}
                        | <a
                            href="{{ url('category/' . $latest_post->Category->slug) }}">{{ $latest_post->Category->name }}</a>
                    </div>
                    </p>
                    <h2>{{ $latest_post->title }}</h2>
                    <p class="card-text">{{ Str::limit(strip_tags($latest_post->desc), 150, '...') }}</p>
                </div>
            </div>
            <div class="small-articles">
                @foreach ($articles as $item)
                    <div class="small-article" data-aos="fade-down">
                        <a href="{{ url('p/' . $item->slug) }}"><img class="card-img-top post-img"
                                src="{{ asset('storage/back/' . $item->img) }}" alt="..." /></a>
                        <div class="small-article-description">
                            <p>
                            <div class="small text-muted">{{ $item->created_at->format('m-d-Y') }}
                                | {{ $item->User->name }}
                                | <a href="{{ url('category/' . $item->Category->slug) }}">{{ $item->Category->name }}</a>
                            </div>
                            </p>
                            <h2>{{ $item->title }}</h2>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- <div>
                    {{ $articles->links() }}
                </div> --}}
                <div class="button-article">
                    <button><a href="{{ url('/articles') }}">Explore Post Lainnya</a></button>
                </div>
        </div>
    </section>

@endsection
<!-- Footer-->
