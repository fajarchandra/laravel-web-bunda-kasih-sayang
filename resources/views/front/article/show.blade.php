{{-- @include('front.layout.navbar') --}}
@extends('front.layout.template')
<!-- Page header with logo and tagline-->
@section('title' , $article->title . ' | Almar Dev')
<!-- Page content-->
@section('content')
    <div class="container" style="margin-top: 110px">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <a href="{{ url('p/' . $article->slug) }}">
                        <img class="card-img-top single-img" src="{{ asset('storage/back/' . $article->img) }}"
                            alt="{{ $article->title }}" /></a>
                    <div class="card-body">
                        <div class="small text-muted">
                            <span>{{ $article->created_at->format('m-d-Y') }}</span> 
                            |  {{ $article->User->name }} | 
                        
                            <span>
                                <a href="{{ url('category/'.$article->category->slug )}}">{{ $article->category->name }}</a>    
                            </span> | 
                            <span>{{ $article->views }}</span>x
                        </div>
                        <h1 class="card-title">{{ $article->title }}</h1>
                        <p class="card-text">{!! $article->desc !!}</p>

                        <div class="mt-5">
                            <p>Share this</p>
                            <a class="btn btn-primary" href="https://www.facebook.com/sharer.php?u={{ url()->current()}}" target="_blank">
                            <i class="fab fa-facebook"></i></a>
                            <a class="btn btn-success" href="https://api.whatsapp.com/send?text={{ url()->current()}}" target="_blank">
                            <i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side widgets-->
            @include('front.layout.side-widget')
        </div>
    </div>
@endsection

{{-- @include('front.layout.template') --}}
