<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pengguna = User::where('roles', 'umkm')->get()->count();
        $produk = Produk::count();
        $penjualan = Penjualan::count();

        return view('Admin.dashboard.index', compact('pengguna', 'produk', 'penjualan'));
    }

    public function produk()
    {
        $produk = Produk::with('umkm')->latest()->get();

        return view('Admin.produk.index', compact('produk'));
    }

    public function penjualan()
    {
        $penjualan = Penjualan::with('umkm')->latest()->get();

        return view('Admin.penjualan.index', compact('penjualan'));
    }

    public function pengguna()
    {
        $user = User::where('roles', 'umkm')->get();
        return view('Admin.pengguna.index', compact('user'));
    }

    public function showPengguna($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        return view('Admin.Pengguna.show', compact('user'));
    }

    public function editPengguna($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        return view('Admin.Pengguna.edit', compact('user'));
    }

    public function updatePengguna(Request $request, $id)
    {
        try {
            // Validasi request
            $request->validate([
                'roles' => 'required|string',
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users,username,' . $id,
                'alamat_umkm' => 'nullable|string|max:255',
                'email_umkm' => 'nullable|email|max:255',
                'jenis_usaha' => 'nullable|string|max:255',
                'tahun_berdiri' => 'nullable|integer',
                'nama_pemilik' => 'nullable|string|max:255',
            ]);

            // Muat pengguna yang ada dari database
            $user = User::findOrFail($id);

            // Perbarui data pengguna dengan nilai-nilai baru dari request
            $user->update($request->all());

            // Tampilkan alert sukses dan arahkan ke halaman data pengguna
            Alert::success('Success', 'Berhasil Mengupdate data');
            return redirect('/admin/data-pengguna');
        } catch (QueryException $e) {
            // Jika terjadi kesalahan integritas konstrain (contohnya, duplicate entry)
            if ($e->errorInfo[1] == 1062) {
                return back()->withErrors(['username' => 'Username sudah digunakan.'])->withInput();
            }

            // Jika terjadi kesalahan lainnya
            return back()->withErrors(['error' => 'Terjadi kesalahan. Silakan coba lagi.'])->withInput();
        }
    }


    public function destroyPengguna($id)
    {
        $user = User::find($id);

        $user->delete();
        return redirect('admin/data-pengguna');
    }
}
