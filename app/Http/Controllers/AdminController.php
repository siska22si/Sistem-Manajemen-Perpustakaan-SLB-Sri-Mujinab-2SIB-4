<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = DB::table('bukus')
            ->join('kategori', 'bukus.kategori', '=', 'kategori.id_kategori')
            ->select('bukus.cover', 'bukus.id_buku', 'bukus.judul', 'bukus.status', 'bukus.isbn', 'kategori.kategori as nama_kategori', 'bukus.jumlah', 'bukus.tahun', 'bukus.penerbit', 'bukus.nomor_rak')
            ->get();
        $buku=DB::table("bukus")->count();
        $total_buku=DB::table("bukus")->sum('jumlah');
        $pinjam=DB::table("peminjaman")->count();
        return view('admin.dashboard', compact('buku','total_buku', 'pinjam', 'data')); // Sesuaikan dengan nama file blade Anda, misalnya 'home.blade.php'
    }

}
