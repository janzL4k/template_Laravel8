@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Kategori</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/">Beranda</a></div>
            <div class="breadcrumb-item">Kategori</div>
        </div>
    </div>

    <div class="modal fade" id="kelolaMatapelajaran" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="#" method="POST" id="formKelolaProvince">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title"><span>Tambah</span> Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama Kategori</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

</section>
@endsection
