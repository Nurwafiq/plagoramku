@extends('LayoutUmkm.app', ['title' => 'Data Penjualan'])

@section('isicontent')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card table-responsive p-md-4 p-2">
                    <form method="POST" action="/umkm/data-penjualan/update/{{ $penjualan->id }}">
                        @csrf
                        <div class="mb-3">
                            <label for="no_faktur" class="form-label">Nomor Faktur Penjualan</label>
                            <input type="text" id="no_faktur" class="form-control"
                                placeholder="Masukkan Nomor Faktur Penjualan" value="{{ $penjualan->no_faktur }}" name="no_faktur">
                        </div>
                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" id="nama_produk" class="form-control"
                                placeholder="Masukkan Nama Produk" value="{{ $penjualan->nama_produk }}" name="nama_produk">
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga Produk</label>
                            <input type="number" id="harga" class="form-control"
                                placeholder="Masukkan Harga Produk" value="{{ $penjualan->harga }}" name="harga">
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori Produk</label>
                            <input type="text" id="kategori" class="form-control"
                                placeholder="Masukkan Kategori Produk" value="{{ $penjualan->kategori }}" name="kategori">
                        </div>
                        <div class="mb-3">
                            <label for="letak_barang" class="form-label">Letak Barang</label>
                            <input type="text" id="letak_barang" class="form-control"
                                placeholder="Masukkan Letak Barang" value="{{ $penjualan->letak_barang }}" name="letak_barang">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_pembelian" class="form-label">Tanggal Pembelian</label>
                            <input type="date" id="tanggal_pembelian" class="form-control" value="{{ $penjualan->tanggal_pembelian }}"
                                name="tanggal_pembelian">
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_pembelian" class="form-label">Jumlah Pembelian Produk</label>
                            <input type="number" id="jumlah_pembelian" class="form-control"
                                placeholder="Masukkan Jumlah Pembelian Produk" value="{{ $penjualan->jumlah_pembelian }}" name="jumlah_pembelian">
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ url('/umkm/data-penjualan') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
