<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $buku=DB::table("bukus")
        ->join('kategori', 'bukus.kategori', '=', 'kategori.id_kategori')->get();
        $jenis_buku=DB::table("bukus")->count();
        $kategori=DB::table("kategori")->count();
        $total_buku=DB::table("bukus")->sum('jumlah');
        $pinjam=DB::table("peminjaman")->count();
        return view('HomeUser.index', compact('buku', 'jenis_buku','kategori', 'total_buku', 'pinjam')); // Sesuaikan dengan nama file blade Anda, misalnya 'home.blade.php'
    }

    public function listbuku()
    {
        $buku=DB::table("bukus")
        ->join('kategori', 'bukus.kategori', '=', 'kategori.id_kategori')->get();
        $kategori=DB::table("kategori")->get();
        return view('HomeUser.buku', compact('buku', 'kategori')); // Sesuaikan dengan nama file blade Anda, misalnya 'home.blade.php'
    }

    public function detailbuku($id)
    {
        
        $buku=DB::table("bukus")->where('id_buku' ,$id)->first();
        return view('HomeUser.buku-detail', compact ('buku')); // Sesuaikan dengan nama file blade Anda, misalnya 'home.blade.php'
    }

}
