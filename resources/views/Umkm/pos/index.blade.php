@extends('LayoutUmkm.app', ['title' => 'Payment Of Sale'])

@section('isicontent')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card p-md-4 p-2">
                    <form action="{{ url('/umkm/data-penjualan/pos') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="no_faktur" class="form-label">No Faktur</label>
                                    <input required type="number" name="no_faktur" id="no_faktur"
                                        placeholder="Masukkan No Faktur" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tanggal_pembelian" class="form-label">Tanggal Transaksi</label>
                                    <input required type="date" name="tanggal_pembelian" id="tanggal_pembelian" class="form-control">
                                </div>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', (event) => {
                                    var now = new Date();

                                    // Mendapatkan waktu Indonesia Tengah (WITA) - UTC+8
                                    var witaOffset = 8 * 60; // WITA is UTC+8
                                    var localOffset = now.getTimezoneOffset(); // Offset waktu lokal pengguna dari UTC dalam menit
                                    var witaTime = new Date(now.getTime() + (witaOffset - localOffset) * 60 * 1000); // WITA time

                                    var tanggalHariIni = witaTime.toISOString().split('T')[0]; // Mendapatkan tanggal dalam format YYYY-MM-DD
                                    document.getElementById('tanggal_pembelian').value = tanggalHariIni;
                                });
                            </script>
                        </div>

                        <div class="row mt-3">
                            <div id="product-rows" class="mb-3">
                                <div class="row product-row mb-3">
                                    <div class="col-md-2">
                                        <label for="kd_produk" class="form-label">Kode Produk</label>
                                        <input type="text" id="kd_produk" name="kd_produk[]"
                                            class="form-control @error('kd_produk') is-invalid @enderror" required
                                            placeholder="Masukkan Kode Produk">
                                        @error('kd_produk')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label for="nama_produk" class="form-label">Nama Produk</label>
                                        <input type="text" id="nama_produk" name="nama_produk[]" class="form-control"
                                            required placeholder="Masukkan Nama Produk">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="kategori" class="form-label">Kategori</label>
                                        <input type="text" id="kategori" name="kategori[]" class="form-control"
                                            required placeholder="Masukkan Kategori">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="letak_barang" class="form-label">Letak Barang</label>
                                        <input type="text" id="letak_barang" class="form-control" required
                                            placeholder="Masukkan Letak Barang" name="letak_barang[]">
                                    </div>
                                    <div class="col-md-1">
                                        <label for="jumlah_pembelian" class="form-label">Jumlah
                                            </label>
                                        <input type="number" id="jumlah_pembelian" name="jumlah_pembelian[]"
                                            class="form-control" required placeholder="Masukkan Jumlah Pembelian"
                                            oninput="calculateTotal()">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="harga" class="form-label">Harga Produk</label>
                                        <input type="number" id="harga" name="harga[]" class="form-control"
                                            required placeholder="Masukkan Harga Produk" oninput="calculateTotal()">
                                    </div>
                                    <div class="col-md-1 align-self-end">
                                        <div class="d-flex gap-2">
                                            <button type="button"
                                                class="d-block btn btn-primary btn-sm add-row">+</button>
                                            <button type="button"
                                                class="d-block btn btn-danger btn-sm remove-row">-</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-11">
                                <div class="d-flex justify-content-end">
                                    <label class="form-label">Total Harga : </label>
                                    <span id="totalHarga" class="form-label"></span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                <button type="submit" class="btn btn-primary">Proses Transaksi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.add-row').addEventListener('click', function() {
                let row = document.querySelector('.product-row').cloneNode(true);
                row.querySelectorAll('input').forEach(input => input.value = '');
                document.getElementById('product-rows').appendChild(row);
                row.querySelector('.add-row').addEventListener('click', function() {
                    let newRow = row.cloneNode(true);
                    newRow.querySelectorAll('input').forEach(input => input.value = '');
                    document.getElementById('product-rows').appendChild(newRow);
                    attachRemoveEvent(newRow);
                });
                attachRemoveEvent(row);
            });

            function attachRemoveEvent(row) {
                row.querySelector('.remove-row').addEventListener('click', function() {
                    if (document.querySelectorAll('.product-row').length > 1) {
                        row.remove();
                        calculateTotal();
                    }
                });
            }

            attachRemoveEvent(document.querySelector('.product-row'));
        });

        function calculateTotal() {
            let total = 0;
            document.querySelectorAll('.product-row').forEach(row => {
                let jumlah = row.querySelector('input[name="jumlah_pembelian[]"]').value;
                let harga = row.querySelector('input[name="harga[]"]').value;
                if (jumlah && harga) {
                    total += jumlah * harga;
                }
            });
            document.getElementById('totalHarga').innerText = total;
            let formattedTotal = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(total);

            document.getElementById('totalHarga').innerText = formattedTotal;
            console.log(formattedTotal);
        }
    </script>
@endsection
