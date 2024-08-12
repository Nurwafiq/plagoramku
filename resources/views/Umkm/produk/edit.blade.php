@extends('LayoutUmkm.app', ['title' => 'Data Produk'])

@section('isicontent')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card table-responsive p-md-4 p-2">
                    <form method="POST" action="/umkm/data-produk/update/{{ $produk->id }}">
                        @csrf
                        <div class="mb-3">
                            <label for="kd_produk" class="form-label">Kode Produk</label>
                            <input type="text" id="kd_produk"
                                class="form-control @error('kd_produk') is-invalid @enderror"
                                value="{{ old('kd_produk', $produk->kd_produk) }}" placeholder="Masukkan Kode Produk"
                                name="kd_produk">

                            @error('kd_produk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" id="nama_produk" class="form-control" value="{{ $produk->nama_produk }}"
                                placeholder="Masukkan Nama Produk" name="nama_produk">
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga Produk</label>
                            <input type="number" id="harga" class="form-control" value="{{ $produk->harga }}"
                                placeholder="Masukkan Harga Produk" name="harga">
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori Produk</label>
                            <input type="text" id="kategori" class="form-control" value="{{ $produk->kategori }}"
                                placeholder="Masukkan Kategori Produk" name="kategori">
                        </div>
                        <div class="mb-3">
                            <label for="letak_barang" class="form-label">Letak Barang</label>
                            <input type="text" id="letak_barang" class="form-control" value="{{ $produk->letak_barang }}"
                                placeholder="Masukkan Letak Barang" name="letak_barang">
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ url('/umkm/data-produk') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
