@extends('front.layout.template')

@section('title', 'Contact - Almar Dev')
<!-- Page content-->
@section('content')
    <section class="isi-contact">
        <div class="container" style="margin-top: 100px">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-12 text-center mb-5">
                    <h2>Silahkan Download secara</h2>
                    <h1>Gratis</h1>
                    <h2>Semua tentang tools, Strategi, E-book dan lainnya untuk agar kita dapat meningkatkan standarisasi
                        kita
                        di level berikutnya!
                        <br>
                        Semua itu telah merubah hidup saya dan sekarang saatnya anda melakukannya.
                    </h2>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        @foreach ($articles as $item)
                            <div class="container-isi-contact text-center">
                                <div class="row">
                                    <div class="col-lg-12" data-aos="fade-down">
                                        <div class="row">
                                            <div class="col-lg-3 text-center">
                                                <img src="{{ asset('storage/back/' . $item->img) }}"
                                                    alt="{{ $item->img }}" class="img-fluid" weight="80%">
                                            </div>
                                            <div class="col-lg-6 text-lg-start text-center" style="margin: auto">
                                                @if ($item->pdf)
                                                    <button class="bg-primary"><a href="{{ url('p/' . $item->slug) }}">Read
                                                            more →</a></button>
                                                    <button><a href="{{ asset('/storage/back/pdf/' . $item->pdf) }}">FREE
                                                            DOWNLOAD</a></button>
                                                @else
                                                    <button class="bg-primary"><a href="{{ url('p/' . $item->slug) }}">Read
                                                            more →</a></button>
                                                @endif
                                                <h3>{{ $item->title }}</h3>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="download text-center">
                                                    @if ($item->pdf)
                                                        <a href="{{ asset('/storage/back/pdf/' . $item->pdf) }}"><i
                                                                class="fa-solid fa-download text-center"></i></a>
                                                        <h2>Download</h2>
                                                    @else
                                                        <span class="d-none"></span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div> 
                    @include('front.layout.side-widget')

                    
                    <!-- Side widgets-->
                </div>
                {{ $articles->links() }}
            </div>
        </div>
    </section>
@endsection
<!-- Footer-->
