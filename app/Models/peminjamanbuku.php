<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjamanbuku extends Model
{

        protected $fillable = [
            'id_buku',
            'nama_peminjam',
            'tanggal_pinjam',
            'tanggal_kembali', // Menambahkan kolom _token ke dalam fillable
        ];
    protected $primaryKey = 'id_buku';

    protected $table = 'peminjamanbuku';
    public $timestamps = false;
}
