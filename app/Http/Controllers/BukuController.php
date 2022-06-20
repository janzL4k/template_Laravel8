<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;









class BukuController extends Controller
{
    public function index(){
        $kategori = Kategori::all();
        $data_buku = Buku::all()->sortByDesc('id');
        $no = 0;
        return view('buku.buku', compact('data_buku', 'kategori','no'),[
            "title"=>"buku"
        ]);
    }

    public function create(){
              return view('buku.create',[
            "title"=> "Tambah Buku",
        ]);
    }

    public function store(Request $request){

        $data_buku = Buku::create([
            'kategori_buku'=>$request->kategori,
            'judul_buku'=>$request->judul_buku,
            'jumlah_buku'=>$request->jumlah_buku,
            'tg_masuk'=>$request->tgl_masuk,
            'status'=>$request->status,
        ]);
        return redirect()->back()->with('success', compact('kategori_buku'),'Data berhasil ditambahkan');
        // return view('buku.edit',[
        //     "title"=> "Edit Buku",
        // ]);
    }

    public function edit(){
    $kategori = Kategori::all();
    $data_buku = Buku::find($id);
    return view('buku.buku', compact('data_buku', 'kategori'),[
        "title"=> "Buku",
    ]);
}

public function update(Request $request, $id)
{
    $data_buku = Buku::find($id);
    $data_buku->kategori=$request->kategori;

    $data_buku->judul_buku=$request->judul_buku;
    $data_buku->jumlah_buku=$request->jumlah_buku;
    $data_buku->tg_masuk=$request->tg_masuk;
    $data_buku->status=$request->status;

    $kategori->update();
    return redirect()->back()->with('success','Data berhasil diubah');
}

}
