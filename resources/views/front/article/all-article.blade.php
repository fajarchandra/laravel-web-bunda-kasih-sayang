@extends('front.layout.template')

@section('title', 'All Articles' . ' | Almar Dev')

@section('content')

    <div class="container" style="margin-top: 100px">
        <div class="mb-2">
            <form action="{{ route('search') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="keyword" placeholder="Search Article..." />
                    <button class="btn btn-primary" id="button-search" type="submit">Submit!</button>
                </div>
            </form>
        </div>
        @if ($keyword)
            <p>Showing Article with keyword : <b>{{ $keyword }}</b></p>
            <a href="{{ url('all-article') }}" class="btn btn-primary btn-sm mb-2">Search Again</a>
        @endif

        <div class="row">
            @forelse ($articles as $item)
                <div class="col-lg-4 ">
                    <div class="card mb-4 shadow-sm">
                        <a href="{{ url('p/' . $item->slug) }}"><img class="card-img-top post-img"
                                src="{{ asset('storage/back/' . $item->img) }}" alt="..." /></a>
                        <div class="card-body card-height">
                            <div class="small text-muted">{{ $item->created_at->format('h-m-Y') }}
                                | {{ $item->User->name }}
                                |
                                <a href={{ url('/category/' . $item->Category->slug) }}>{{ $item->Category->name }}</a>
                            </div>
                            <h2 class="card-title h4">{{ $item->title }}</h2>
                            <p class="card-text">{{ Str::limit(strip_tags($item->desc), 150, '...') }}</p>
                            <a class="btn btn-primary" href="{{ url('p/' . $item->slug) }}">Read more →</a>
                        </div>
                    </div>
                </div>
            @empty
                <h3>Not Found</h3>
            @endforelse
            <div>
                {{ $articles->links() }}
            </div>
        </div>
    </div>
@endsection
