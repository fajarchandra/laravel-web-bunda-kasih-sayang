@extends('front.layout.template')

@section('title', 'All Categorie' . ' | Almar Dev')

@section('content')
    <div class="container" style="margin-top: 120px">
        <p>Showing all article :</p>
        <div class="row">
            @foreach ($category as $item)
                <div class="col-sm-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <div class="text-center">
                                    <span>
                                        <i class="fas fa-folder fa-5x"></i>
                                    </span>
                                    <h5 class="card-title">
                                        <a href="{{ url('category/'.$item->slug) }}" class="text-decoration-none text-dark">
                                            {{ $item->name }} ({{ $item->articles_count }})</a>
                                    </h5>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
