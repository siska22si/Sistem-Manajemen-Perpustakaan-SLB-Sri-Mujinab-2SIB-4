<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class RakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('rak')->get();

        return view('rak.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judulBukus = DB::table('bukus')->select('id_buku', 'judul')->get();
        return view('rak.create', compact('judulBukus'));
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
            'nama_rak' => 'required'
          ]);
         
           DB::insert("INSERT INTO `rak` (`nama_rak`)VALUES (?)",
           [$request->nama_rak]);
           return redirect()->route('rak.index')->with(['success' => 'data berhasil disimpan']);

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
        $data = DB::table('rak')->where('id_rak', $id)->first();
        return view('rak.edit', compact('data'));
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
            'nama_rak' => 'required',
        ]);

        DB::update("UPDATE `rak` SET `nama_rak`=? WHERE id_rak =?",
            [$request->nama_rak, $id]);

        return redirect()->route('rak.index')->with(['success' => 'Data berhasil diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('rak')->where('id_rak',$id)->delete();

        //redirect to index
        return redirect()->route('rak.index')->with(['success'=>' data berhasil dihapus']);
    }
}
