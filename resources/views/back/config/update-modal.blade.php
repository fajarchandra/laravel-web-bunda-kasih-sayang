@foreach ($config as $item) 
<div class="modal fade" id="modalUpdate{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Config</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('config/'.$item->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="bm-3">
                        <label for="name"></label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid                        
                        @enderror"
                            value="{{ old('name', $item->name) }}" readonly>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="bm-3">
                        <label for="value"></label>
                        <textarea name="value" id="value" cols="30" rows="5"class="form-control 
                        @error('value') is-invalid                        
                        @enderror">{{old('value', $item->value)}}</textarea>
                        @error('value')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
