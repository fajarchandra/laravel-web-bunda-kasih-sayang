@extends('front.layout.template')

@section('title', 'About - Almar Dev')
<!-- Page content-->
@section('content')

<section class="isi-about">
    <div class="paragraf-satu-about">
        <div class="col-sm-12 text-center">
            <p>HI, Apa kabar ?</p>
            <h2 class="typing-char">SAYA RIDA</h2>
            <img src="{{ asset('front/img/about/Website Design-04.jpg')}}" alt="">
        </div>
    </div>
</section>

<section class="about-caption">
    <div class="container-about-caption">
        <div class="about-caption">
            <div class="col-sm-12 text-center" data-aos="zoom-in">
                <h1>Banyak hal yang saya
                    lakukan seperti : Seminar,
                    Menulis Buku, FGD, Menjadi
                    Wakil Wali Kota Cirebon</h1>
            </div>
            <div class="row">
                <div class="col-sm-6" data-aos="slide-up">
                    <p> Pada kenyataannya, semua kegiatan ini
                        benar-benar menyenangkan. Dapat bertemu
                        banyak orang, bercerita dan memberikan
                        manfaat. Senyum mereka seakan-akan
                        menjadi nadir saya. Semangat berbagi dan
                        melayani adalah tujuan hidup saya.</p>
                </div>
                <div class="col-sm-6" data-aos="slide-up">
                    <p>Sebagai pengusaha sukses. Saya sudah
                        selesai dengan permasalahan yang terjadi
                        pada diri saya sendiri. Perjalanan usaha ini
                        terus berkembang menjadikan saya seorang
                        pribadi yang terus ingin melayani dengan
                        sepenuh hati. Alhamdulillah, mimpi yang
                        tidak terfikirkan namun menjadi kenyataan.
                        Jalan melayani ini menjadi arah yang lebih
                        tepat dan terarah yaitu menjadi Wakil Wali
                        Kota Cirebon 2025-2030.</p>
                </div>
            </div>
        </div>
</section>

<!-- galeri -->
<section class="galeri-about" id="galeri-about">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Kepo Dengan Kegiatan dan Programnya ?</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p>Banyak Kegiatan dan Program perkembangan lainnya. Yuk bahas idenya </p>
            </div>
        </div>
        <button><a href="#">Pengen E-Book gratis?Klik disini</a></button>
    </div>
</section>
<!-- endgaleri -->

<!-- biografi -->
<section class="biografi" id="biografi">
    <div class="container-biografi">
        <div class="mobile-view">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('front/img/about/Website Design-04.jpg')}}" class="d-block w-100" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('front/img/about/Website Design-05.jpg')}}" class="d-block w-100" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('front/img/about/Website Design-06.jpg')}}" class="d-block w-100" alt="">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
            </div>
        </div>
        <div class="item-biografi" data-aos="fade-down">
            <img src="{{ asset('front/img/about/Website Design-04.jpg')}}" alt="">
        </div>
        <div class="item-biografi" data-aos="fade-left">
            <p>BIOGRAFI</p>
            <h2>
                Beranjak dari bukan siapa-siapa.
                Hanya seorang istri yang membantu
                suami mengurus usaha
                PT. Specia Automotive Parts
                Kabupaten Cirebon kemudian
                berkembang memiliki Bandar Djakarta
                Cirebon dan beberapa usaha.
                Keinginan untuk membantu
                masyarakat semakin berkembang
                dengan membuat beberapa kegiatan
                seperti Program ibu hamil,
                Membangun Rumah Kasih Sayang,
                Buka Bersama Ojol di parkiran
                belakang Bandar Djakarta.</h2>
        </div>
        <div class="item-biografi-blok" data-aos="fade-down">
            <img class="images-float" src="{{  asset('front/img/about/Website Design-05.jpg')}}" alt="">
        </div>
        <div class="item-biografi" data-aos="fade-down">
            <img src="{{  asset('front/img/about/Website Design-06.jpg')}}" alt="">
        </div>
        <div class="item-biografi" data-aos="fade-right">
            <h2>Mengikuti kontestasi PILKADA Kota
                Cirebon sebagai Wakil Wali Kota
                menjadikan hasrat saya semakin tinggi
                untuk mengabdi kepada masyrakat.
                Insyaallah, dengan terpilihnya saya
                sebagai Wakil Wali Kota Cirebon.
                Bersama warga kita bisa wujudkan
                kebangkitan kota Cirebon lebih Maju</h2>
        </div>
        <div class="item-biografi"></div>
        <div class="item-biografi"></div>
        <div class="item-biografi"></div>
        <div class="item-biografi-blok-bottom" data-aos="fade-left">
            <img src="{{ asset('front/img/about/Website Design-07.jpg')}}" alt="">
        </div>
    </div>


</section>
@endsection
<!-- Footer-->
