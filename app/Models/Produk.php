<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $fillable = ['kategori_id','nama_umkm', 'nama_produk', 'deskripsi_produk', 'harga_produk', 'stok_produk', 'gambar_produk'];
}
