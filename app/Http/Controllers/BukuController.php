<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Buku;
use DB;
class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Buku::join('kategori', 'bukus.kategori', '=', 'kategori.id_kategori')
        ->select('bukus.cover', 'bukus.id_buku', 'bukus.judul', 'bukus.status', 'bukus.isbn', 'kategori.kategori as nama_kategori', 'bukus.jumlah', 'bukus.tahun', 'bukus.penerbit', 'bukus.nomor_rak', 'bukus.deskripsi')
        ->paginate(1);

        return view('buku.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $raklist=DB::table('rak')->pluck('nama_rak', 'id_rak');
        $kategoriList = DB::table('kategori')->pluck('kategori', 'id_kategori');
        return view('buku.create', compact('kategoriList', 'raklist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'cover' => 'required|image|mimes:jpg,jpeg,png',
            'judul' => 'required',
            'status' => 'required',
            'isbn' => 'required',
            'kategori' => 'required',
            'jumlah' => 'required',
            'tahun' => 'required',
            'penerbit' => 'required', 
            'nomor_rak' => 'required',
            'deskripsi' => 'required'      
          ]);
          $gambar_cover=$request->file('cover');
          $gambar_cover->storeAs('public/cover', $gambar_cover->getClientOriginalName());
          
           DB::insert("INSERT INTO `bukus` (`cover`, `judul`,`status`,`isbn`,`kategori`,`jumlah`,`tahun`,`penerbit`,`nomor_rak`,`deskripsi`)values(?,?,?,?,?,?,?,?,?,?)",
           [$gambar_cover->getClientOriginalName(), $request->judul,$request->status,$request->isbn,$request->kategori,$request->jumlah,$request->tahun,$request->penerbit,$request->nomor_rak,$request->deskripsi]);
           return redirect()->route('buku.index')->with(['success' => 'data berhasil disimpan']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  hh$id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Mengambil data peminjaman berdasarkan id
        $data = DB::table('bukus')->where('id_buku', $id)->first();
        $raklist=DB::table('rak')->pluck('nama_rak', 'id_rak');
        // Mengambil data judul buku untuk dropdown
        $nama_kategori = DB::table('kategori')->select('id_kategori', 'kategori')->get();
        $nama_rak=DB::table('rak')->pluck('id_rak', 'nama_rak');

        return view('buku.edit', compact('data', 'nama_kategori', 'nama_rak', 'raklist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'status' => 'required',
            'isbn' => 'nullable|string',
            'kategori' => 'required',
            'jumlah' => 'required',
            'tahun' => 'required',
            'penerbit' => 'required',
            'nomor_rak' => 'required',
            'deskripsi' => 'required',
        ]);

        DB::update("UPDATE `bukus` SET `judul`=?, `status`=?, `isbn`=?, `kategori`=?, `jumlah`=?, `tahun`=?, `penerbit`=?, `nomor_rak`=?, `deskripsi=?` WHERE id_buku =?",
            [$request->judul, $request->status, $request->isbn, $request->kategori, $request->jumlah, $request->tahun, $request->penerbit, $request->nomor_rak, $request->deskripsi, $id]);

        return redirect()->route('buku.index')->with(['success' => 'Data berhasil diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('bukus')->where('id_buku',$id)->delete();

        //redirect to index
        return redirect()->route('buku.index')->with(['success'=>' data berhasil dihapus']);
    }
}
