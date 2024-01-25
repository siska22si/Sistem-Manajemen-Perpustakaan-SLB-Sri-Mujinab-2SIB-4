<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('peminjaman')
        ->join('bukus', 'peminjaman.buku', '=', 'bukus.id_buku')
        ->select('peminjaman.id_pinjam', 'peminjaman.nama_peminjam', 'peminjaman.tgl_pinjam', 'peminjaman.tgl_kembali', 'bukus.judul')
        ->get();
        return view ('peminjaman.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judulBukus = DB::table('bukus')->select('id_buku', 'judul')->get();
        return view('peminjaman.create', compact('judulBukus'));
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
            'nama_peminjam' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'buku' => 'required'    
          ]);
         
           DB::insert("INSERT INTO `peminjaman` (`nama_peminjam`,`tgl_pinjam`,`tgl_kembali`,`buku`)values(?,?,?,?)",
           [$request->nama_peminjam,$request->tgl_pinjam,$request->tgl_kembali,$request->buku]);
           return redirect()->route('peminjaman.index')->with(['success' => 'data berhasil disimpan']);

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
        $data = DB::table('peminjaman')->where('id_pinjam', $id)->first();

        // Mengambil data judul buku untuk dropdown
        $judulBukus = DB::table('bukus')->select('id_buku', 'judul')->get();

        return view('peminjaman.edit', compact('data', 'judulBukus'));
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
            'nama_peminjam' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'buku' => 'required',
        ]);

        DB::update("UPDATE `peminjaman` SET `nama_peminjam`=?, `tgl_pinjam`=?, `tgl_kembali`=?, `buku`=? WHERE id_pinjam =?",
            [$request->nama_peminjam,$request->tgl_pinjam,$request->tgl_kembali,$request->buku, $id]);

        return redirect()->route('peminjaman.index')->with(['success' => 'Data berhasil diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('peminjaman')->where('id_pinjam',$id)->delete();

        //redirect to index
        return redirect()->route('peminjaman.index')->with(['success'=>' data berhasil dihapus']);
    }
}
