<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

                @if (isset ($program))
                <form action="/admin/posts/program/{{$program->id}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                @else
                <form action="/admin/posts/program/" method="POST" enctype="multipart/form-data">
                    
                @endif
                    @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="title" value="{{ isset($program) ? $program->title :  old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Cover</label>
                        <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror" placeholder="********">

                        @error('cover')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        @if (isset($program))
                            <img src="/{{ $program->cover }}" width="100%" class="mt-4" alt="">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="">Body</label>
                        <textarea type="text" id="summernote" name="desc" class="form-control @error('desc') is-invalid @enderror" placeholder="desc">{{ isset($program) ? $program->desc : old('desc') }}</textarea>
                        @error('desc')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>

                   
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>