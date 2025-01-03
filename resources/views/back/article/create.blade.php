@extends('back.layout.template')


@section('title', 'Create Articles - Admin')
{{-- content --}}
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Create Article</h1>
        </div>
        <div class="mt-3">
            <a href="{{ url('article/create') }}" class="btn btn-success mb-2">Create</a>
            @if ($errors->any())
                <div class="mt-3">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form action="{{ url('article') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ old('title') }}">
                        </div>    
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="" hidden>-- Choose --</option>
                                @foreach ($Categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                    <div class="mb-3">
                        <label for="desc">Description</label>
                        <textarea name="desc" id="myeditor" cols="30" rows="10" class="form-control">
                        </textarea>
                    </div>

                    <div class="mb-3">
                        <label for="img">Image (Max:2Mb)</label>
                        <input type="file" name="img" id="img" class="form-control">

                        <div class="mt-3">
                            <img src="" class="img-thumbnail img-preview" width="100px">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="" hidden>-- Choose --</option>
                                    <option value="1">Publish</option>
                                    <option value="0">Private</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="publish_date">Publish Date</label>
                                <input type="date" name="publish_date" id="publish_date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="pdf" class="form-label">Upload PDF</label>
                        <input type="file" name="pdf" id="pdf" class="form-control" accept="application/pdf">
                    </div>
                    <div class="float-end">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/4.25.0-lts/standard/ckeditor.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadeUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadeUrl: '/laravel-filemanager/upload?type=Files&_token=',
            clipboard_handleImage: false
        }
    </script>
   
   <script>
    // ckeditor
        CKEDITOR.replace('myeditor' , options);

        // js untuk image preview
        $('#img').change(function(){
            previewImage(this);
        });

        function previewImage(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e){
                    $('.img-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }

        }
    </script>

@endpush


{{-- footer --}}
