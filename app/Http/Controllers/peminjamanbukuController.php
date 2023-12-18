<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjamanbuku;

class PeminjamanbukuController extends Controller
{
    public function index()
    {
        $peminjamanbuku = Peminjamanbuku::all();
        return view('peminjamanbuku.index', compact('peminjamanbuku'));
    }

    public function create()
    {
        return view('peminjamanbuku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_peminjam' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
        ]);

        Peminjamanbuku::create($request->all());

        return redirect()->route('peminjamanbuku.index')->with('success', 'Peminjaman telah ditambahkan');
    }

    public function edit(Peminjamanbuku $peminjamanbuku)
    {
        return view('peminjamanbuku.edit', compact('peminjamanbuku'));
    }

    public function update(Request $request, Peminjamanbuku $peminjamanbuku)
    {
        $request->validate([
            'nama_peminjam' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
        ]);

        $peminjamanbuku->update($request->all());

        return redirect()->route('peminjamanbuku.index')->with('success', 'Peminjaman telah diperbarui');
    }

    public function destroy(Peminjamanbuku $peminjamanbuku)
    {
        $peminjamanbuku->delete();

        return redirect()->route('peminjamanbuku.index')->with('success', 'Peminjaman telah dihapus');
    }
}
