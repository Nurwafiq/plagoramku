<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function landingPage()
    {
        return view('landingPage');
    }

    public function login()
    {
        return view('login');
    }

    public function regis()
    {
        return view('regis');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = auth()->user();

            if ($user->roles == 'admin') {
                Alert::success('Berhasil Login', 'Selamat Datang Admin');
                return redirect('/dashboard-admin');
            } elseif ($user->roles == 'umkm') {
                Alert::success('Berhasil Login', 'Selamat Datang ' . $user->name);
                return redirect('/dashboard-umkm');
            } else {
                return back()->withErrors([
                    'status' => 'Akun anda tidak tervalidasi',
                ]);
            }
        }

        return back()->withErrors([
            'password' => 'Username atau password Anda salah',
        ]);
    }

    public function postRegis(Request $request)
    {
        $user = new User();

        $user->roles = $request->roles;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);

        $user->alamat_umkm = $request->alamat_umkm;
        // $user->no_wa_umkm = $request->no_wa_umkm;
        $user->email_umkm = $request->email_umkm;
        $user->jenis_usaha = $request->jenis_usaha;
        $user->tahun_berdiri = $request->tahun_berdiri;

        $user->nama_pemilik = $request->nama_pemilik;
        // $user->no_wa_pemilik = $request->no_wa_pemilik;

        $user->save();
        Alert::success('Berhasil Mendaftar', 'Silahkan Login');
        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
