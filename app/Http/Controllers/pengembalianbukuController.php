<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengembalianbuku;

class pengembalianbukuController extends Controller
{
    public function index()
    {
        $pengembalianbuku = pengembalianbuku::all();
        return view('pengembalianbuku.index', compact('pengembalianbuku'));
    }

    public function create()
    {
        return view('pengembalianbuku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pengembalian' => 'required',
        ]);

        pengembalianbuku::create($request->all());

        return redirect()->route('pengembalianbuku.index')->with('success', 'pengembalianbuku telah di tambahkan');
    }

    public function edit(pengembalianbuku $pengembalianbuku)
    {
        return view('pengembalianbuku.edit', compact('pengembalianbuku'));
    }

    public function update(Request $request, pengembalianbuku $pengembalianbuku)
    {
        $request->validate([    
            'id_pinjam' => 'required',
            'tanggal_pengembalian' => 'required',
        ]);

        $pengembalianbuku->update($request->all());

        return redirect()->route('pengembalianbuku.index')->with('success', 'pengembalianbuku telah di perbarui');
    }

    public function destroy(pengembalianbuku $pengembalianbuku)
    {
        $pengembalianbuku->delete();

        return redirect()->route('pengembalianbuku.index')->with('success', 'pengembalianbuku telah di hapus');
    }
}