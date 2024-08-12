<?php

namespace App\Http\Controllers;

use App\Imports\PenjualanImport;
use App\Models\Penjualan;
use App\Models\Produk;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class PenjualanController extends Controller
{
    public function pos()
    {
        $tanggalhariini = Carbon::now()->format('Y-m-d');
        return view('Umkm.pos.index', compact('tanggalhariini'));
    }

    public function index()
    {
        $user = Auth::user();

        $penjualan = Penjualan::where("umkm_id", $user->id)->get();
        return view('Umkm.penjualan.index', compact('penjualan'));
    }

    public function store(Request $request)
    {
        dd($request);
        // Validasi request
        $request->validate([
            'no_faktur' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
            'letak_barang' => 'required',
            'tanggal_pembelian' => 'required',
            'jumlah_pembelian' => 'required',
        ]);

        // Mendapatkan umkm_id dari Auth user ID
        $umkm_id = auth()->user()->id;

        // Membuat penjualan baru
        $penjualan = new Penjualan([
            'umkm_id' => $umkm_id,
            'no_faktur' => $request->no_faktur,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
            'letak_barang' => $request->letak_barang,
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'jumlah_pembelian' => $request->jumlah_pembelian,
        ]);

        // Menyimpan penjualan
        $penjualan->save();
        Alert::success('Success', 'Berhasil Menambahkan data');

        return redirect('/umkm/data-penjualan');
    }

    public function storeMany(Request $request)
    {
        // Validasi request
        $request->validate([
            'no_faktur' => 'required|string',
            'nama_produk.*' => 'required|string',
            'harga.*' => 'required|numeric',
            'kategori.*' => 'required|string',
            'letak_barang.*' => 'required|string',
            'tanggal_pembelian' => 'required|date',
            'jumlah_pembelian.*' => 'required|numeric',
        ]);

        // Mendapatkan umkm_id dari Auth user ID
        $umkm_id = auth()->user()->id;

        // Iterasi melalui setiap input produk dan simpan
        foreach ($request->nama_produk as $index => $nama_produk) {
            $penjualan = new Penjualan([
                'umkm_id' => $umkm_id,
                'no_faktur' => $request->no_faktur,
                'tanggal_pembelian' => $request->tanggal_pembelian,
                'nama_produk' => $nama_produk,
                'harga' => $request->harga[$index],
                'kategori' => $request->kategori[$index],
                'letak_barang' => $request->letak_barang[$index],
                'jumlah_pembelian' => $request->jumlah_pembelian[$index],
            ]);

            $penjualan->save();
        }

        Alert::success('Success', 'Berhasil Menambahkan data');
        return redirect('/umkm/data-penjualan');
    }



    public function edit($id)
    {
        $user = Auth::user();
        // Mendapatkan data penjualan berdasarkan ID
        $penjualan = Penjualan::findOrFail($id);
        $produk = Produk::where('umkm_id', $user->id)->get();

        return view('Umkm.penjualan.edit', compact('penjualan', 'produk'));
    }

    public function update(Request $request, $id)
    {
        $penjualan = Penjualan::where('id', $id)->first();
        $data = $request->all();

        $penjualan->update($data);
        Alert::success('Success', 'Berhasil Mengupdate data');
        return redirect('/umkm/data-penjualan');
    }

    public function destroy($id)
    {
        // Mendapatkan data penjualan berdasarkan ID
        $penjualan = Penjualan::findOrFail($id);

        // Menghapus data penjualan
        $penjualan->delete();
        Alert::success('Success', 'Berhasil Menghapus data');

        return redirect('/umkm/data-penjualan');
    }

    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        $path = $file->store('temp'); // Simpan file sementara ke direktori 'temp' di penyimpanan Laravel

        Excel::import(new PenjualanImport, $path);

        // Hapus file sementara setelah diimpor
        Storage::delete($path);

        // Jika Anda ingin menampilkan pesan sukses, Anda dapat menggunakan alert atau flash message
        Alert::success('Success', 'Berhasil Import data');

        return redirect('/umkm/data-penjualan');
    }
}
