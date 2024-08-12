<?php

namespace App\Imports;

use App\Models\Penjualan;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class PenjualanImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    private static $firstRow = false;
    public function model(array $row)
    {
        if (!self::$firstRow) {
            self::$firstRow = true;
            return null;
        }
        return new Penjualan([
            'umkm_id' => Auth::user()->id,
            'no_faktur' => $row[0],
            'nama_produk' => $row[1],
            'harga' => $row[2],
            'kategori' => $row[3],
            'letak_barang' => $row[4],
            'tanggal_pembelian' => $row[5],
            'jumlah_pembelian' => $row[6],
        ]);
    }
}
