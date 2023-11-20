<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pustakawan;

class PustakawanController extends Controller
{
    public function index()
    {
        $pustakawans = Pustakawan::all();
        return view('pustakawan.index', compact('pustakawans'));
    }

    public function create()
    {
        return view('pustakawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        Pustakawan::create($request->all());

        return redirect()->route('pustakawan.index')->with('success', 'Pustakawan telah di tambahkan');
    }

    public function edit(Pustakawan $pustakawan)
    {
        return view('pustakawan.edit', compact('pustakawan'));
    }

    public function update(Request $request, Pustakawan $pustakawan)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $pustakawan->update($request->all());

        return redirect()->route('pustakawan.index')->with('success', 'Pustakawan telah di perbarui');
    }

    public function destroy(Pustakawan $pustakawan)
    {
        $pustakawan->delete();

        return redirect()->route('pustakawan.index')->with('success', 'Pustakawan telah di hapus');
    }
}