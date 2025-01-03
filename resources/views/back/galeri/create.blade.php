@extends('back.layout.template')


@section('title', 'Create Galeri - Admin')
{{-- content --}}
@section('content')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h1>Tambah Galeri</h1>
    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="value" class="form-label">Value</label>
            <input type="text" name="value" id="value" class="form-control" value="{{ old('value') }}">
        </div>
        <div class="mb-3">
            <label for="image">Gambar</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection



{{-- footer --}}
