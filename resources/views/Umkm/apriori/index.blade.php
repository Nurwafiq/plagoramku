@extends('LayoutUmkm.app', ['title' => 'Uji Planogram'])

@section('isicontent')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                {{-- Itemset 1 --}}
                {{-- <div class="card mb-3">
                    <div class="card-header">
                        <div class="fw-bold fs-4">
                            1 Itemset
                        </div>
                    </div>
                    <div class="card-body table-responsive p-md-4 p-2">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Item/Produk</th>
                                    <th>Jumlah Pembelian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($individualCounts as $item => $count)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item }}</td>
                                        <td>{{ $count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> --}}

                {{-- Itemset 2 --}}
                {{-- <div class="card mb-3">
                    <div class="card-header">
                        <div class="fw-bold fs-4">
                            2 Itemset
                        </div>
                    </div>
                    <div class="card-body table-responsive p-md-4 p-2">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Item/Produk</th>
                                    <th>Jumlah Pembelian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cooccurrenceCounts as $item => $count)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item }}</td>
                                        <td>{{ $count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> --}}

                {{-- Itemset 3 --}}
                {{-- <div class="card mb-3">
                    <div class="card-header">
                        <div class="fw-bold fs-4">
                            3 Itemset
                        </div>
                    </div>
                    <div class="card-body table-responsive p-md-4 p-2">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Item/Produk</th>
                                    <th>Jumlah Pembelian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cooccurrence3Counts as $item => $count)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item }}</td>
                                        <td>{{ $count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> --}}
            </div>
            <div class="col-12">
                {{-- Hasil Analisa --}}
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="fw-bold fs-4">
                            Hasil Analisa 2 Itemset
                        </div>
                    </div>
                    <div class="card-body table-responsive p-md-4 p-2">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Hasil Planogram</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($top2ItemsetRecommendations as $key => $recommendation)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{!! $recommendation !!}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- Hasil Analisa --}}
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="fw-bold fs-4">
                            Hasil Analisa 3 Itemset
                        </div>
                    </div>
                    <div class="card-body table-responsive p-md-4 p-2">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Hasil Planogram</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($top3ItemsetRecommendations as $key => $recommendation)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{!! $recommendation !!}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
