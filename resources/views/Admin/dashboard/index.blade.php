@extends('LayoutAdmin.app', ['title' => 'Dashboard'])

@section('isicontent')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card p-2">
                    <div class="d-flex">
                        <i class="ti ti-users" style="font-size: 80px;"></i>
                        <div class="mx-auto align-self-center">
                            <p class="mb-0">Jumlah Pengguna</p>
                            <p class="fs-6 mb-0 text-center">{{ $pengguna }}</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="card p-2">
                    <div class="d-flex">
                        <i class="ti ti-shopping-cart" style="font-size: 80px;"></i>
                        <div class="mx-auto align-self-center">
                            <p class="mb-0">Jumlah Produk</p>
                            <p class="fs-6 mb-0 text-center">{{ $produk }}</p>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-md-6">
                <div class="card p-2">
                    <div class="d-flex">
                        <i class="ti ti-report-money" style="font-size: 80px;"></i>
                        <div class="mx-auto align-self-center">
                            <p class="mb-0">Jumlah Penjualan</p>
                            <p class="fs-6 mb-0 text-center">{{ $penjualan }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
