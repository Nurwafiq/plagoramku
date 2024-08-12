<!-- resources/views/Umkm/pos/index.blade.php -->

@extends('LayoutAdmin.app', ['title' => 'Data Pengguna'])

@section('isicontent')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card p-4">
                    <form action="{{ url('/admin/data-pengguna/update/' . $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3">
                                <input type="text" placeholder="Masukkan Roles" class="form-control" id="roles"
                                    name="roles" hidden value="{{ $user->roles }}" required/>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama UMKM <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Masukkan Nama UMKM" class="form-control" id="name"
                                    name="name" value="{{ $user->name }}" required/>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Username" class="form-control" id="username"
                                        name="username" value="{{ $user->username }}" required/>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_umkm" class="form-label">Alamat UMKM</label>
                                    <input type="text" placeholder="Masukkan Alamat UMKM" class="form-control"
                                        id="alamat_umkm" name="alamat_umkm" value="{{ $user->alamat_umkm }}"/>
                                </div>
                                <div class="mb-3">
                                    <label for="email_umkm" class="form-label">Email</label>
                                    <input type="email" placeholder="Masukkan Email UMKM" class="form-control" id="email_umkm"
                                        name="email_umkm" value="{{ $user->email_umkm }}"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="jenis_usaha" class="form-label">Jenis Usaha</label>
                                    <input type="text" placeholder="Masukkan Jenis Usaha" class="form-control"
                                        id="jenis_usaha" name="jenis_usaha" value="{{ $user->jenis_usaha }}"/>
                                </div>
                                <div class="mb-3">
                                    <label for="tahun_berdiri" class="form-label">Tahun Berdiri</label>
                                    <input type="number" placeholder="Masukkan Tahun Berdiri UMKM" class="form-control"
                                        id="tahun_berdiri" name="tahun_berdiri" value="{{ $user->tahun_berdiri }}"/>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_pemilik" class="form-label">Nama Pemilik UMKM</label>
                                    <input type="text" placeholder="Masukkan Nama Pemilik UMKM" class="form-control"
                                        id="nama_pemilik" name="nama_pemilik" value="{{ $user->nama_pemilik }}"/>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 justify-content-center d-flex gap-2">
                            <button type="submit" class="btn btn-secondary">Update</button>
                            <a href="{{ url('/admin/data-pengguna') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
