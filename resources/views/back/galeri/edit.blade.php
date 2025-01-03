@extends('back.layout.template')


@section('title', 'Create Galeri - Admin')
{{-- content --}}
@section('content')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h1>Edit Galeri</h1>
    <form action="{{ route('galeri.update', $galeri->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $galeri->name }}" required>
        </div>
        <div class="mb-3">
            <label for="value" class="form-label">Value</label>
            <input type="text" name="value" id="value" class="form-control" value="{{ $galeri->value }}">
        </div>
        <div class="mb-3">
            <label for="image">Gambar</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection