<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'umkm_id',
        "no_faktur",
        "nama_produk",
        "harga",
        "kategori",
        "letak_barang",
        "tanggal_pembelian",
        "jumlah_pembelian",
    ];

    public function umkm()
    {
        return $this->belongsTo(User::class, 'umkm_id');
    }
}
