@extends('LayoutAdmin.app', ['title' => 'Data Produk'])

@section('isicontent')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card table-responsive p-md-4 p-2">
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>UMKM</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Letak Barang</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->umkm->name }}</td>
                                    <td>{{ $item->nama_produk }}</td>
                                    <td>{{ $item->harga }}</td>
                                    <td>{{ $item->kategori }}</td>
                                    <td>{{ $item->letak_barang }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
