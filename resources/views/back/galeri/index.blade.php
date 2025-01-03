@extends('back.layout.template')

@section('title','List Categories - Admin')
{{-- content --}}
@section('content')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h1>List Galeri</h1>
    <a href="{{ route('galeri.create') }}" class="btn btn-primary mb-3">Create Galeri</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Value</th>
                <th>Image</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($galeris as $galeri)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $galeri->name }}</td>
                <td>{{ $galeri->value }}</td>
                <td>
                    @if ($galeri->image)
                        <img src="{{ asset('storage/' . $galeri->image) }}" alt="Gambar" width="100">
                    @else
                        Tidak ada gambar
                    @endif
                </td>
                <td>
                    <a href="{{ route('galeri.edit', $galeri->id) }}" class="btn btn-secondary">Edit</a>
                    <form action="{{ route('galeri.destroy', $galeri->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $galeris->links() }}
</div>
@endsection


{{-- footer --}}



{{-- footer --}}
