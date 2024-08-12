<?php

namespace App\Imports;

use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class ProdukImport implements ToModel
{
    private static $firstRow = false;

    public function model(array $row)
    {
        try {
            if (!self::$firstRow) {
                self::$firstRow = true;
                return null;
            }

            // Validasi data sebelum menyimpan
            $validator = Validator::make($row, [
                'kd_produk' => 'unique:produks,kd_produk', // Pastikan 'kd_produk' unik pada tabel 'produks'
            ]);

            if ($validator->fails()) {
                // Tambahkan pernyataan dd() untuk debugging
                dd("Failed Validation for kd_produk: {$row[0]}", $validator->errors()->first());

                // Handle kesalahan validasi di sini, misalnya, log atau kirim pesan ke pengguna
                // Log::error($validator->errors()->first());
                // throw new CustomException($validator->errors()->first(), 422);
                return null;
            }

            return new Produk([
                'umkm_id' => Auth::user()->id,
                'kd_produk' => $row[0],
                'nama_produk' => $row[1],
                'harga' => $row[2],
                'kategori' => $row[3],
                'letak_barang' => $row[4],
            ]);
        } catch (\Exception $e) {
            // Tambahkan pernyataan dd() untuk debugging
            dd("Exception during import: " . $e->getMessage());

            // Handle kesalahan lain di sini
            // Log::error($e->getMessage());
            // throw new CustomException("An error occurred during import", 500);
            return null;
        }
    }
}
