<?php

namespace App\Http\Controllers;
use App\Models\kategoribuku;
use Illuminate\Http\Request;

class KategoribukuController extends Controller
{
    public function index()
    {
        $kategoribuku = kategoribuku::all();
        return view('kategoribuku.index', compact('kategoribuku'));
    }

    public function create()
    {
        
        return view('kategoribuku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required', // Sesuaikan dengan nama kolom yang benar dalam tabel
        ]);

        kategoribuku::create($request->all());

        return redirect()->route('kategoribuku.index')->with('success', 'Kategori buku telah ditambahkan');
    }

    public function edit(kategoribuku $kategoribuku) // Perubahan di sini
    {
        return view('kategoribuku.edit', compact('kategoribuku'));
    }

    public function update(Request $request, kategoribuku $kategoribuku) // Perubahan di sini
    {
        $request->validate([
            'nama_kategori' => 'required', // Sesuaikan dengan nama kolom yang benar dalam tabel
        ]);

        $kategoribuku->update($request->all());

        return redirect()->route('kategoribuku.index')->with('success', 'Kategori buku telah diperbarui');
    }

    public function destroy(kategoribuku $kategoribuku) // Perubahan di sini
    {
        $kategoribuku->delete();

        return redirect()->route('kategoribuku.index')->with('success', 'Kategori buku telah dihapus');
    }
}