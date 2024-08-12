@extends('LayoutAdmin.app', ['title' => 'Data Penjualan'])

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
                                <th>No Faktur</th>
                                <th>Tanggal Transaksi</th>
                                <th>Jumlah Pembelian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penjualan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->umkm->name }}</td>
                                    <td>{{ $item->nama_produk }}</td>
                                    <td>{{ $item->no_faktur }}</td>
                                    <td>{{ $item->tanggal_pembelian }}</td>
                                    <td>{{ $item->jumlah_pembelian }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
