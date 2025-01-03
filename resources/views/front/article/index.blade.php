{{-- @include('front.layout.navbar') --}}
@extends('front.layout.template')

@section('title', 'Article - Almar Dev')

@section('content')

    <section class="isi-article">
        <div class="sapa-article">
            <div class="col-sm-12 text-center">
                <h2>Apa kabar</h2>
                <h1>Semua</h1>
                <h3>?</h3>
                <div>

                    <p>Jalani semuanya tanpa henti dan Selalu berikan yang terbaik.</p>
                </div>
            </div>
        </div>
        <div class="button-isi-article">
            <a href="#">Suka dengan kisahnya ? Lihat yang lebih menarik lagi</a>
        </div>
    </section>

    <section class="carousel-galeri" id="carousel">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($galeris as $index => $galeri)
                    
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img src="{{ Storage::url( $galeri->image ) }}" class="d-block w-100" alt="...">
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
        </div>
    </section>

    <section class="article" id="article">
        <div class="container-title-article">
            <div class="col-sm-12 mt-3">
                <h2 class="text-center">Kasih Sayang <br> Blitz Blog</h2>
            </div>
        </div>
        <div class="container-article">
            <div class="main-article text-center">
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
                    <div class="small-article">
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
                    <button><a href="{{ url('all-article') }}">Explore Post Lainnya</a></button>
                </div>
        </div>
    </section>
@endsection

<!-- Footer-->
{{-- @include('front.layout.template') --}}
