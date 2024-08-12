<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>
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
                    <div class="col-md-6">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="/" class="text-nowrap logo-img text-center d-block pb-3 w-100">
                                    <img src="{{ asset('img/icon-login.png') }}" width="160" alt=""
                                        loading="lazy">
                                </a>
                                <p class="text-center px-md-5">Halaman Login <br> Algoritma Apriori Untuk UMKM
                                </p>
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
                                <form action="{{ url('/login') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="text" class="form-label">Username</label>
                                        <input type="username" placeholder="Username" class="form-control"
                                            id="username" name="username" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" placeholder="Password" class="form-control"
                                            id="password" name="password" />
                                    </div>
                                    <div class="d-flex mb-3 gap-2">
                                        <a href="{{ url('/regis') }}" class="btn btn-outline-primary w-100">Daftar
                                            Akun</a>
                                        <button class="btn btn-primary w-100">Login</button>
                                    </div>
                                </form>
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
