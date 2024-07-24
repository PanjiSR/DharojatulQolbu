<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <a href="/admin/posts/program" class="btn btn-primary my-2 px-4"><i class="fas fa-arrow-left"></i> Kembali</a>
                <h4><b> {{ $program->title }} </b></h4>
                <p>date created {{ $program->created_at }} </p>
                <img src="/{{ $program->cover }}" width="100%" alt="">
                <div class="py-2"></div>
                <p>{!! $program->desc !!} </p>
            </div>
        </div>
    </div>
</div>