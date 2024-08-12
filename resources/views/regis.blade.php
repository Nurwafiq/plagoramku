<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Register Akun</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('gambar/logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}" />
</head>

<body>
    <!--  Body Wrapper -->
    @include('sweetalert::alert')

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8">
                        <div class="card mb-0">
                            <div class="card-body">
                                <h3 class="text-center"> Daftarkan Akun UMKM
                                </h3>
                                @if (session('success'))
                                    <p class="alert alert-success">{{ session('success') }}</p>
                                @endif
                                @if (session('wait'))
                                    <p class="alert alert-danger">{{ session('wait') }}</p>
                                @endif
                                @if ($errors->any())
                                    @foreach ($errors->all() as $err)
                                        <p class="alert alert-danger">{{ $err }}</p>
                                    @endforeach
                                @endif
                                <form action="{{ url('/regis') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3">
                                            <input type="hidden" class="form-control" name="roles" value="umkm" />
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="text" class="form-label">Nama UMKM <span
                                                        class="text-danger">*</span></label>
                                                <input type="name" placeholder="Masukkan Nama UMKM"
                                                    class="form-control" id="name" name="name" required />
                                            </div>
                                            <div class="mb-3">
                                                <label for="text" class="form-label">Username <span
                                                        class="text-danger">*</span></label>
                                                <input type="username" placeholder="Username" class="form-control"
                                                    id="username" name="username" required />
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password <span
                                                        class="text-danger">*</span></label>
                                                <input type="password" placeholder="Password" class="form-control"
                                                    id="password" name="password" required />
                                            </div>
                                            <div class="mb-3">
                                                <label for="alamat_umkm" class="form-label">Alamat UMKM</label>
                                                <input type="text" placeholder="Masukkan Alamat UMKM"
                                                    class="form-control" id="alamat_umkm" name="alamat_umkm" />
                                            </div>
                                            {{-- <div class="mb-3">
                                                <label for="no_wa_umkm" class="form-label">Nomor WA/Telp</label>
                                                <input type="number" placeholder="Masukkan Nomor WA/Telp UMKM"
                                                    class="form-control" id="no_wa_umkm" name="no_wa_umkm" />
                                            </div> --}}
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="email_umkm" class="form-label">Email</label>
                                                <input type="email" placeholder="Masukkan Email UMKM"
                                                    class="form-control" id="email_umkm" name="email_umkm" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="jenis_usaha" class="form-label">Jenis Usaha</label>
                                                <input type="text" placeholder="Masukkan Jenis Usaha"
                                                    class="form-control" id="jenis_usaha" name="jenis_usaha" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="tahun_berdiri" class="form-label">Tahun Berdiri</label>
                                                <input type="number" placeholder="Masukkan Tahun Berdiri UMKM"
                                                    class="form-control" id="tahun_berdiri" name="tahun_berdiri" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama_pemilik" class="form-label">Nama Pemilik UMKM</label>
                                                <input type="text" placeholder="Masukkan Nama Pemilik UMKM"
                                                    class="form-control" id="nama_pemilik" name="nama_pemilik" />
                                            </div>
                                            {{-- <div class="mb-3">
                                                <label for="no_wa_pemilik" class="form-label">Nomor WA/Telp
                                                    Pemilik</label>
                                                <input type="number"
                                                    placeholder="Masukkan Nomor WA/Telp Pemilik UMKM"
                                                    class="form-control" id="no_wa_pemilik" name="no_wa_pemilik" />
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3 gap-md-4 gap-2">
                                        <button class="btn btn-primary w-100">Daftar
                                            Akun</button>
                                    </div>
                                </form>
                                <div class="d-flex justify-content-center">
                                    <p class="mb-0">Sudah punya akun? <a
                                            href="{{ url('/login') }}">Login</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
