<?php

namespace App\Http\Controllers;
use App\Models\buku;
use Illuminate\Http\Request;


class bukuController extends Controller
{
    public function index()
    {
        $buku = buku::all();
        return view('buku.index', compact('buku'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'status' => 'required',
            'ISBN' => 'required|integer',
            'kategori' => 'required',
            'jumlah' => 'required|integer',
            'tahun' => 'required|integer',
            'penerbit' => 'required',
        ]);

        buku::create($request->all());

        return redirect()->route('buku.index')->with('success', 'buku telah di tambahkan');
    }

    public function edit(buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, buku $buku)
    {
        $request->validate([
            'judul' => 'required',
            'status' => 'required',
            'ISBN' => 'required',
            'kategori' => 'required',
            'jumlah' => 'required|integer',
            'tahun' => 'required|integer',
            'penerbit' => 'required',
        ]);

        $buku->update($request->all());

        return redirect()->route('buku.index')->with('success', 'buku telah di perbarui');
    }

    public function destroy(buku $buku)
    {
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'buku telah di hapus');
    }
}