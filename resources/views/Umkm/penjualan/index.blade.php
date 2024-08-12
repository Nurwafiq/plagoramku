@extends('LayoutUmkm.app', ['title' => 'Data Penjualan'])

@section('isicontent')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card table-responsive p-md-4 p-2">
                    <div class="d-flex gap-2 justify-content-between mb-3">
                        {{-- <a href="{{url('/umkm/data-penjualan/pos')}}" class="btn btn-info">POS</a> --}}
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                Tambah Data
                            </button>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#exampleModal2">
                                Import Data
                            </button>
                        </div>
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
                                <form action="{{ url('/umkm/data-penjualan') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="no_faktur" class="form-label">Nomor Faktur Penjualan</label>
                                            <input type="text" id="no_faktur" class="form-control"
                                                placeholder="Masukkan Nomor Faktur Penjualan" required name="no_faktur">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_produk" class="form-label">Nama Produk</label>
                                            <input type="text" id="nama_produk" class="form-control"
                                                placeholder="Masukkan Nama Produk" required name="nama_produk">
                                        </div>
                                        <div class="mb-3">
                                            <label for="harga" class="form-label">Harga</label>
                                            <input type="number" id="harga" class="form-control"
                                                placeholder="Masukkan Harga Produk" required name="harga">
                                        </div>
                                        <div class="mb-3">
                                            <label for="kategori" class="form-label">Kategori</label>
                                            <input type="text" id="kategori" class="form-control"
                                                placeholder="Masukkan Kategori Produk" required name="kategori">
                                        </div>
                                        <div class="mb-3">
                                            <label for="letak_barang" class="form-label">Letak Barang</label>
                                            <input type="text" id="letak_barang" class="form-control"
                                                placeholder="Masukkan Letak Barang" required name="letak_barang">
                                        </div>
                                        <div class="mb-3">
                                            <label for="tanggal_pembelian" class="form-label">Tanggal Pembelian</label>
                                            <input type="date" id="tanggal_pembelian" class="form-control" required
                                                name="tanggal_pembelian">
                                        </div>
                                        <div class="mb-3">
                                            <label for="jumlah_pembelian" class="form-label">Jumlah Pembelian Produk</label>
                                            <input type="number" id="jumlah_pembelian" class="form-control"
                                                placeholder="Masukkan Jumlah Pembelian Produk" required
                                                name="jumlah_pembelian">
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
                                <form action="{{ route('penjualan.importExcel') }}" method="POST"
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
                                <th class="text-nowrap">No</th>
                                <th class="text-nowrap">Nomor Faktur</th>
                                <th class="text-nowrap">Nama Produk</th>
                                <th class="text-nowrap">Harga</th>
                                <th class="text-nowrap">Kategori</th>
                                <th class="text-nowrap">Letak Barang</th>
                                <th class="text-nowrap">Tanggal Transaksi</th>
                                <th class="text-nowrap">Jumlah Pembelian</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penjualan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->no_faktur }}</td>
                                    <td>{{ $item->nama_produk }}</td>
                                    <td>{{ $item->harga }}</td>
                                    <td>{{ $item->kategori }}</td>
                                    <td>{{ $item->letak_barang }}</td>
                                    <td>{{ $item->tanggal_pembelian }}</td>
                                    <td>{{ $item->jumlah_pembelian }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="/umkm/data-penjualan/edit/{{ $item->id }}"
                                                class="btn btn-sm btn-info">
                                                <i class="ti ti-pencil"></i>
                                            </a>
                                            <form action="/umkm/data-penjualan/{{ $item->id }}" method="POST">
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
