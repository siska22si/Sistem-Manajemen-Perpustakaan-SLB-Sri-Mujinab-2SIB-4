<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::select(DB::raw("select * from kategori"));
        return view ('kategori.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
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
            'kategori' => 'required'      
          ]);
         
           DB::insert("INSERT INTO `kategori` (`kategori`)VALUES (?)",
           [$request->kategori]);
           return redirect()->route('kategori.index')->with(['success' => 'data berhasil disimpan']);

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
        $data=DB::table('kategori')->where('id_kategori', $id)->first();
        return view('kategori.edit', compact('data'));
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
            'kategori' => 'required',
        ]);

        DB::update("UPDATE `kategori` SET `kategori`=? WHERE id_kategori =?",
            [$request->kategori, $id]);

        return redirect()->route('kategori.index')->with(['success' => 'Data berhasil diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('kategori')->where('id_kategori',$id)->delete();

        //redirect to index
        return redirect()->route('kategori.index')->with(['success'=>' data berhasil dihapus']);
    }
}
