@extends('LayoutAdmin.app', ['title' => 'Data Pengguna'])

@section('isicontent')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card table-responsive p-md-4 p-2">
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama UMKM</th>
                                <th>Alamat UMKM</th>
                                <th>Jenis Usaha</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->alamat_umkm }}</td>
                                    <td>{{ $item->jenis_usaha }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="/admin/data-pengguna/edit/{{ $item->id }}" class="btn btn-sm btn-primary">
                                                <i class="ti ti-pencil"></i>
                                            </a>
                                            <a href="/admin/data-pengguna/show/{{ $item->id }}" class="btn btn-sm btn-info">
                                                <i class="ti ti-eye"></i>
                                            </a>
                                            <form action="/admin/data-pengguna/{{ $item->id }}" method="POST">
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
