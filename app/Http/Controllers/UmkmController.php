<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UmkmController extends Controller
{
    public function dashboard()
    {
        $user_id = Auth::user()->id;
        $produk = Produk::where('umkm_id', $user_id)->count();
        $penjualan = Penjualan::where('umkm_id', $user_id)->count();

        return view('Umkm.dashboard.index', compact('produk', 'penjualan'));
    }
}
