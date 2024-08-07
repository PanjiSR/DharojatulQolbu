<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <a href="/admin/gallery/create" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah</a>
                    <tr>
                        <td>No</td>
                        <td>Gambar</td>
                        <td>Headline</td>
                        <td>Action</td>
                    </tr>
                    @foreach ($gallery as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="/{{ $item->gambar }}" width="200px" alt=""></td>
                        <td>{{ $item->headline }}</td>
                        <td>
                            <div class="d-flex">
                            <a href="/admin/gallery/{{ $item->id }}/edit" class="btn btn-success mx-2"><i class="fas fa-pen"></i> Edit</a>

                            <form action="/admin/gallery/{{ $item->id }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                            </form>
                            </div>
                            {{-- <a href="#" class="btn btn-danger">Hapus</a> --}}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>