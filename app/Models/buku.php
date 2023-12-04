<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{

        protected $fillable = [
            'judul',
            'ISBN',
            'penerbit',
            'kategori',
            'jumlah',
            'tahun',
            'status',
        ];
    protected $primaryKey = 'id_buku';
    public $timestamps = false;
    protected $table = 'buku';

}