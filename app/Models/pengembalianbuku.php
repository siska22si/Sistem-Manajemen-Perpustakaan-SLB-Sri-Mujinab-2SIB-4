<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengembalianbuku extends Model    
{
    protected $primaryKey = 'id_pengembalian';
    public $timestamps = false;
    protected $fillable = ['id_pinjam', 'tanggal_pengembalian'];
}