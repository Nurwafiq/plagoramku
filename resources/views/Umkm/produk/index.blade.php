@extends('LayoutUmkm.app', ['title' => 'Data Produk'])

@section('isicontent')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card table-responsive p-md-4 p-2">
                    <div class="d-flex gap-2 justify-content-end mb-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                            Tambah Data
                        </button>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#exampleModal2">
                            Import Data
                        </button>
                    </div>

                    <!-- Modal1 -->
                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ url('/umkm/data-produk') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="kd_produk" class="form-label">Kode Produk</label>
                                            <input type="text" id="kd_produk"
                                                class="form-control @error('kd_produk') is-invalid @enderror" required
                                                placeholder="Masukkan Kode Produk" name="kd_produk">
                                        </div>
                                        @error('kd_produk')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="mb-3">
                                            <label for="nama_produk" class="form-label">Nama Produk</label>
                                            <input type="text" id="nama_produk" class="form-control" required
                                                placeholder="Masukkan Nama Produk" name="nama_produk">
                                        </div>
                                        <div class="mb-3">
                                            <label for="harga" class="form-label">Harga Produk</label>
                                            <input type="number" id="harga" class="form-control" required
                                                placeholder="Masukkan Harga Produk" name="harga">
                                        </div>
                                        <div class="mb-3">
                                            <label for="kategori" class="form-label">Kategori Produk</label>
                                            <input type="text" id="kategori" class="form-control" required
                                                placeholder="Masukkan Kategori Produk" name="kategori">
                                        </div>
                                        <div class="mb-3">
                                            <label for="letak_barang" class="form-label">Letak Barang</label>
                                            <input type="text" id="letak_barang" class="form-control" required
                                                placeholder="Masukkan Letak Barang" name="letak_barang">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal2 -->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Import Excel</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('produk.importExcel') }}" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="modal-body">
                                        @csrf
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="file" required />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Produk</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Letak Barang</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kd_produk }}</td>
                                    <td>{{ $item->nama_produk }}</td>
                                    <td>{{ $item->harga }}</td>
                                    <td>{{ $item->kategori }}</td>
                                    <td>{{ $item->letak_barang }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="/umkm/data-produk/edit/{{ $item->id }}"
                                                class="btn btn-sm btn-info">
                                                <i class="ti ti-pencil"></i>
                                            </a>
                                            <form action="/umkm/data-produk/{{ $item->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
