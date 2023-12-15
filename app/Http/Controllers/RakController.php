<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rak;

class RakController extends Controller
{
    public function index()
    {
        $rak = rak::all();
        return view('rak.index', compact('rak'));
    }

    public function create()
    {
        return view('rak.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_rak' => 'required',
        ]);

        rak::create($request->all());

        return redirect()->route('rak.index')->with('success', 'rak telah di tambahkan');
    }

    public function edit(rak $rak)
    {
        return view('rak.edit', compact('rak'));
    }

    public function update(Request $request, rak $rak)
    {
        $request->validate([
            'nomor_rak' => 'required',
        ]);

        $rak->update($request->all());

        return redirect()->route('rak.index')->with('success', 'rak telah di perbarui');
    }

    public function destroy(rak $rak)
    {
        $rak->delete();

        return redirect()->route('rak.index')->with('success', 'rak telah di hapus');
    }
}