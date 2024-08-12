<?php

namespace App\Http\Controllers;

use App\Imports\ProdukImport;
use App\Models\Produk;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $produk = Produk::where("umkm_id", $user->id)->get();
        return view('Umkm.produk.index', compact('produk'));
    }

    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'kd_produk' => 'required|string|unique:produks,kd_produk',
            'nama_produk' => 'required|string',
            'harga' => 'required|numeric',
            'kategori' => 'required|string',
            'letak_barang' => 'required|string',
        ]);

        // Mendapatkan umkm_id dari Auth user ID
        $umkm_id = auth()->user()->id;

        // Membuat produk baru
        $produk = new Produk([
            'umkm_id' => $umkm_id,
            'kd_produk' => $request->kd_produk,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
            'letak_barang' => $request->letak_barang,
        ]);

        // Menyimpan produk
        $produk->save();
        Alert::success('Success', 'Berhasil Menambahkan data');

        return redirect('/umkm/data-produk');
    }

    public function edit($id)
    {
        // Mendapatkan data produk berdasarkan ID
        $produk = Produk::findOrFail($id);

        return view('Umkm.produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        try {
            // Validasi request
            $request->validate([
                'kd_produk' => 'required|string|unique:produks,kd_produk,' . $id,
                'nama_produk' => 'required|string',
                'harga' => 'required|numeric',
                'kategori' => 'required|string',
                'letak_barang' => 'required|string',
            ]);

            $produk = Produk::where('id', $id)->first();
            $data = $request->all();

            $produk->update($data);
            Alert::success('Success', 'Berhasil Mengupdate data');

            return redirect('/umkm/data-produk');
        } catch (QueryException $e) {
            // Jika terjadi kesalahan integritas konstrain (contohnya, duplicate entry)
            if ($e->errorInfo[1] == 1062) {
                return back()->withErrors(['kd_produk' => 'Kode Produk sudah tersedia.'])->withInput();
            }

            // Jika terjadi kesalahan lainnya
            return back()->withErrors(['error' => 'Terjadi kesalahan. Silakan coba lagi.'])->withInput();
        }
    }

    public function destroy($id)
    {
        // Mendapatkan data produk berdasarkan ID
        $produk = Produk::findOrFail($id);

        // Menghapus data produk
        $produk->delete();
        Alert::success('Success', 'Berhasil Menghapus data');

        return redirect('/umkm/data-produk');
    }

    public function importExcel(Request $request)
    {
        try {
            $file = $request->file('file');
            $path = $file->store('temp');

            Excel::import(new ProdukImport, $path);

            // Hapus file sementara setelah diimpor
            Storage::delete($path);

            // Jika Anda ingin menampilkan pesan sukses, Anda dapat menggunakan alert atau flash message
            Alert::success('Success', 'Berhasil Import data');

            return redirect('/umkm/data-produk');
        } catch (QueryException $e) {
            // Tangkap kesalahan SQLSTATE[23000] Integrity constraint violation
            $errorCode = $e->errorInfo[1];

            if ($errorCode == 1062) {
                // Handle kesalahan duplikasi kunci di sini, misalnya, log atau tampilkan pesan ke pengguna
                Alert::error('Error', 'Duplikasi Kode Produk terdeteksi. Import dibatalkan, periksa format file');

                // Anda dapat menanggapi kesalahan ini sesuai kebutuhan, misalnya, kembali ke halaman sebelumnya
                return redirect()->back();
            } else {
                // Handle kesalahan lain di sini
                Alert::error('Error', 'Terjadi kesalahan selama import. Silakan periksa format file.');
                return redirect()->back();
            }
        }
    }
}
