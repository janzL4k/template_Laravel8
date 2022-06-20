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

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Kategori</h4>

                    <div class="card-header-action">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#kelolaMatapelajaran"><i
                                class="fa fa-plus"></i> Tambah Kategori</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-header">
                        <h4>Previous
                            <nav aria-label="...">
                                <ul class="pagination pagination-sm">
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link">1</span>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                </ul>
                            </nav>
                        </h4>

                        <div class="card-header-action">
                            <input type="search" class="form-control form-control-sm text-center" placeholder="Search"
                                aria-controls="table-1">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="table-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Slug</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @if (Auth::user()->role_id == 1) --}}
                                @forelse ($kategori as $j_kategori)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td>{{ $j_kategori->kategori }}</td>
                                        <td>{{ $j_kategori->slug }}</td>
                                        <td class="text-center">
                                            <div class="d-flex d-inline justify-content-center">
                                                <button class="btn btn-sm btn-success" data-toggle="modal"
                                                    data-target="#editSubject"
                                                    data-id="{{ $j_kategori->id }}"
                                                    data-name="{{ $j_kategori->kategori }}"
                                                    data-slug="{{ $j_kategori->slug }}"
                                                   >
                                                    <i class="fas fa-pencil-alt"></i></button>
                                                <form action="{{route('kategori.kategori.delete', $j_kategori->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm ml-1"
                                                        onclick="return confirm('Apa Anda yakin ?');"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                {{-- @endforeach --}}

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    {{-- t-----------------tambah data --}}
    <div class="modal fade" id="kelolaMatapelajaran" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('kategori.kategori.store') }}" method="post" id="formKelolaProvince">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title"><span>Tambah</span> Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="kategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="kategori" name="kategori" required>
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

    {{-- -----edit data --}}
    <div class="modal fade" id="editSubject" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{-- @foreach ($kategori as $kat) --}}
                <form action="{{ route('kategori.kategori.update', $j_kategori->id)}}" method="post" id="formKelolaProvince">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id">
                    <div class="modal-header">
                        <h5 class="modal-title"><span>Edit</span> Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="kategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $j_kategori->kategori }}" required>

                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" value="{{ $j_kategori->slug }}"  id="slug" name="slug"  required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            {{-- @endforeach --}}
        </div>
    </div>
@endsection


@push('script')
    <script>
        $('#editSubject').on('show.bs.modal', (e) => {
            var id = $(e.relatedTarget).data('id');
            var name = $(e.relatedTarget).data('kategori');
            var slug = $(e.relatedTarget).data('slug');

            $('#editSubject').find('input[name="id"]').val(id);
            $('#editSubject').find('input[name="kategori"]').val(kategori);
            $('#editSubject').find('input[name="slug"]').val(slug);
        });
    </script>
@endpush
