@extends('layouts.main')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Buku Dipinjam</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Buku</h4>

                    <div class="card-header-action">
                        <a href="#" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Peminjam</a>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama peminjam</th>
                                    <th>Nama buku</th>
                                    <th>tanggal pinjam</th>
                                    <th>tanggal pengembalian</th>
                                    <th>No Whatsaap</th>
                                    <th>Tempat Tinggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @forelse ($post as $key => $subject) --}}
                                <tr>
                                    <td>{1</td>
                                    <td>
                                        ibjan syarif
                                    </td>
                                    <td>Sang pemimpi</td>
                                    <td>24-12-22</td>
                                    <td>30-12-22</td>
                                    <td>081907943762</td>
                                    <td>Karang lande ....</td>
                                    <td class="text-center">
                                        <div class="d-flex d-inline justify-content-center">
                                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#editSubject"
                                        {{-- data-id="{{ $subject->id }}" data-link="{{ $subject->link }}" --}}
                                        ><i class="fas fa-pencil-alt"></i></button>
                                        <a
                                        {{-- href="{{route('admin.video.detail', $subject->id)}}" --}}
                                        class="btn btn-sm btn-primary ml-1"
                                        ><i class="fas fa-eye text-white"></i></a>
                                        <form
                                        {{-- action="{{route('admin.video.delete', $subject->id)}}" method="post"> --}}
                                            @csrf
                                            {{-- @method('DELETE') --}}
                                        <button type="submit" class="btn btn-danger btn-sm ml-1" onclick="return confirm('Apa Anda yakin ?');"><i class="fas fa-trash"></i></button>
                                        </form>
                                        </div>
                                    </td>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
