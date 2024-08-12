@extends('LayoutAdmin.app', ['title' => 'Data Pengguna'])

@section('isicontent')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card p-4">
                    <div class="row">
                        <div class="mb-3">
                            <label for="text" class="form-label">Nama UMKM <span class="text-danger">*</span></label>
                            <input type="name" placeholder="Masukkan Nama UMKM" class="form-control" id="name"
                                name="name" disabled value="{{ $user->name }}" />
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="text" class="form-label">Username <span class="text-danger">*</span></label>
                                <input type="username" placeholder="Username" class="form-control" id="username"
                                    name="username" disabled value="{{ $user->username }}" />
                            </div>
                            <div class="mb-3">
                                <label for="alamat_umkm" class="form-label">Alamat UMKM</label>
                                <input type="text" placeholder="Masukkan Alamat UMKM" class="form-control"
                                    id="alamat_umkm" name="alamat_umkm" disabled value="{{ $user->alamat_umkm }}"/>
                            </div>
                            <div class="mb-3">
                                <label for="email_umkm" class="form-label">Email</label>
                                <input type="email" placeholder="Masukkan Email UMKM" class="form-control" id="email_umkm"
                                    name="email_umkm" disabled value="{{ $user->email_umkm }}"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jenis_usaha" class="form-label">Jenis Usaha</label>
                                <input type="text" placeholder="Masukkan Jenis Usaha" class="form-control"
                                    id="jenis_usaha" name="jenis_usaha" disabled value="{{ $user->jenis_usaha }}"/>
                            </div>
                            <div class="mb-3">
                                <label for="tahun_berdiri" class="form-label">Tahun Berdiri</label>
                                <input type="number" placeholder="Masukkan Tahun Berdiri UMKM" class="form-control"
                                    id="tahun_berdiri" name="tahun_berdiri" disabled value="{{ $user->tahun_berdiri }}"/>
                            </div>
                            <div class="mb-3">
                                <label for="nama_pemilik" class="form-label">Nama Pemilik UMKM</label>
                                <input type="text" placeholder="Masukkan Nama Pemilik UMKM" class="form-control"
                                    id="nama_pemilik" name="nama_pemilik" disabled value="{{ $user->nama_pemilik }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 justify-content-center d-flex gap-2">
                        <a href="{{ url('/admin/data-pengguna') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
