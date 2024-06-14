<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class petshop extends Model
{
    protected $table='petshop';
    protected $fillable = [
                            'produk',
                            'kategori', 
                            'stok', 
                            'gambar'
                        ];
}
