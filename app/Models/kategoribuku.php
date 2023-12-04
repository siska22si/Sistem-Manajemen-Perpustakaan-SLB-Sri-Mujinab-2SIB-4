<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoribuku extends Model
{

        protected $fillable = [
       
            'nama_kategori',
          
        ];
    protected $primaryKey = 'id_kategori';
    public $timestamps = false;
    protected $table = 'kategoribuku';

}