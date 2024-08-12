<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'umkm_id',
        'kd_produk',
        'nama_produk',
        'harga',
        'kategori',
        'letak_barang',
    ];

    public function umkm()
    {
        return $this->belongsTo(User::class, 'umkm_id');
    }
}
