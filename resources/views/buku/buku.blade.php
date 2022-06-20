@extends('layouts.main')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Jumlah Buku</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Buku</h4>

                    {{-- <div class="card-header-action">
                        <a href="{{ route('buku.buku.store') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah
                            Buku</a>
                    </div> --}}
                    <div class="card-header-action">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#kelolaMatapelajaran"><i
                                class="fa fa-plus"></i> Tambah Buku</button>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table-1">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Judul Buku</th>
                                    <th>Jumlah Buku</th>
                                    <th>Tanggal masuk</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">


                {{-- masalahnya ada pada passing data kuntuk menampilkan kategori --}}
                                @forelse ($data_buku as $d_buku)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td>{{ $d_buku->kategori }}</td>
                                        <td>{{ $d_buku->judul_buku }}</td>
                                        <td>{{ $d_buku->jumlah_buku }}</td>
                                        <td>{{ $d_buku->tg_masuk }}</td>
                                        <td>{{ $d_buku->status }}</td>
                                        <td class="text-center">

                                            <div class="d-flex d-inline justify-content-center">
                                                <button class="btn btn-sm btn-success" data-toggle="modal"
                                                    data-target="#editSubject" data-id="{{ $d_buku->id }}"
                                                    data-name="{{ $d_buku->kategori }}"
                                                    data-slug="{{ $d_buku->judul_buku }}"
                                                    data-slug="{{ $d_buku->jumlah_buku }}"
                                                    data-slug="{{ $d_buku->tg_masuk }}">

                                                    <i class="fas fa-pencil-alt"></i></button>
                                                <form action="{{ route('buku.buku.delete', $d_buku->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm ml-1"
                                                        onclick="return confirm('Apa Anda yakin ?');"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            </div>

                                        </td>
                                        {{-- <div class="d-flex d-inline justify-content-center">
                                                <a href="{{ route('buku.edit', $d_buku->id) }}"
                                                    class="btn btn-sm btn-success ml-1" data-target="#editSubject"
                                                    data-name="{{ $d_buku->kategori_buku }}"
                                                    data-slug="{{ $d_buku->judul_buku }}"
                                                    data-slug="{{ $d_buku->jumlah_buku }}"
                                                    data-slug="{{ $d_buku->tg_masuk }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <form action="{{route('buku.edit', $d_buku->id)}}" method="post">


                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm ml-1" onclick="return confirm('Apa Anda yakin ?');">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div> --}}


                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse
                                {{-- @endforeach --}}

                            </tbody>
                        </table>
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

                <form action="{{ route('buku.buku.store') }}" method="post" id="formKelolaProvince">
                    @csrf
                    <div class="modal-header">

                        <h5 class="modal-title"><span>Tambah</span> Buku</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select name="kategori" id="kategori" class="custom-select" required>
                                <option value="">~ Pilih ~</option>
                                @foreach ($kategori as $kat)
                                    <option value="{{ $kat->id }}">{{ $kat->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="judul_buku">Judul Buku</label>
                            <input type="text" class="form-control" id="judul_buku" name="judul_buku" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_buku">Jumlah Buku</label>
                            <input type="text" class="form-control" id="jumlah_buku" name="jumlah_buku" required>
                        </div>
                        <div class="form-group">
                            <label for="tgl_masuk">Tanggal Masuk</label>
                            <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            {{-- <input type="text" class="form-control" id="status" name="status" required> --}}
                            <select name="status" id="status" class="custom-select" required>
                                <option value="">~ Pilih ~</option>
                                <option value="Ada">Ada</option>
                                <option value="Dipinjam">Dipinjam</option>
                                <option value="Kosong">Kosong</option>
                                {{-- @foreach ($kategori as $kat)
                                <option value="{{$kat->id}}">{{$kat->kategori}}</option>
                            @endforeach --}}
                            </select>
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


    {{-- editt----------------- --}}
    <div class="modal fade" id="editSubject" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <form action="{{ route('buku.buku.update'), $d_buku->id }}" method="post" id="formKelolaProvince">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title"><span>Edit</span> Buku</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select name="kategori" id="kategori" class="custom-select" required>
                                {{-- @foreach ($kategori as $kat) --}}
                                    <option>{{ $d_buku->kategor }}</option>
                                {{-- @endforeach --}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="judul_buku">Judul Buku</label>
                            <input type="text" class="form-control" value="{{ $d_buku->judul_buku }}" id="judul_buku" name="judul_buku" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_buku">Jumlah Buku</label>
                            <input type="text" class="form-control" id="jumlah_buku" value="{{ $d_buku->jumlah_buku }}" name="jumlah_buku" required>
                        </div>
                        <div class="form-group">
                            <label for="tgl_masuk">Tanggal Masuk</label>
                            <input type="date" class="form-control" id="tgl_masuk" value="{{ $d_buku->tg_masuk }}" name="tgl_masuk" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="custom-select" required>

                                    <option>{{ $d_buku->status }}</option>

                            </select>
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

@endsection





@push('script')
    <script>
        $('#editSubject').on('show.bs.modal', (e) => {
            var id = $(e.relatedTarget).data('id');
            var name = $(e.relatedTarget).data('kategori_buku');
            var slug = $(e.relatedTarget).data('judul_buku');
            var slug = $(e.relatedTarget).data('jumlah_buku');
            var slug = $(e.relatedTarget).data('tg_masuk');

            $('#editSubject').find('input[name="id"]').val(id);
            $('#editSubject').find('input[name="kategori_buku"]').val(kategori_buku);
            $('#editSubject').find('input[name="judul_buku"]').val(judul_buku);
            $('#editSubject').find('input[name="jumlah_buku"]').val(jumlah_buku);
            $('#editSubject').find('input[name="tg_masuk"]').val(tg_masuk);
        });
    </script>
@endpush
