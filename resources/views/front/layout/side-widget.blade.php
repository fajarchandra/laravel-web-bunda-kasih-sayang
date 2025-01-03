<div class="col-lg-4 mt-3" data-aos="fade-left">

    {{-- style="position: relative;
    margin-top: -45%;" --}}
    <!-- Search widget-->
    {{-- <div class="card mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">
            <form action="{{ route('search') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="keyword" placeholder="Search Article..." />
                    <button class="btn btn-primary" id="button-search" type="submit">Submit!</button>
                </div>
            </form>
        </div>
    </div> --}}
    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div>
                @foreach ($categories as $item)
                    <span><a href="{{ url('category/' . $item->slug) }}"
                            class="bg-primary badge text-white unstyle-category">{{ $item->name }} ({{ $item->articles_count }})</a></span>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Side widget-->
    <div class="card mb-4">
        <div class="card-header">Side Widget</div>
        <div class="card-body">
            <a href="{{ $config['ads_widget'] }}">
                <img src="{{ $config['ads_widget'] }}" alt="ads_widget" class="img-fluid" weight="80%">
                {{-- <img src="{!! $config['ads_widget'] !!}" alt="ads_widget" class="img-fluid" weight="80%"> --}}
            </a>
        </div>
    </div>

    {{-- Poplar Post --}}
    <div class="card mb-4">
        <div class="card-header">Popular Post</div>
        <div class="card-body">
            @foreach ($popular_posts as $item)
                <div class="card mb-3">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ asset('storage/back/' . $item->img) }}" alt="{{ $item->title }}"
                                class="img-fluid">
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <p>
                                    <a href="{{ url('p/' . $item->slug) }}">
                                        {{ $item->title }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
