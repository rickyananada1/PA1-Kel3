@extends('dashboard.component.dashboard')
@section('dashboard.content')
    <div class="d-flex justify-content-between">
        <h1 class="h2 fw-bold">Daftar Kategori Sampah</h1>
        <a href="{{ route('sampah.kategori.tambah') }}" class="btn btn-success">Tambahkan kategori sampah</a></div>
    </div>
    <table class="table mt-5">
        <tr>
            <th>
                Nama
            </th>
            <th>
                Deskripsi
            </th>
            <th>
                Aksi
            </th>
        </tr>
    @forelse($KategoriQueries as $data)
        <tr>
            <td>{{ Str::limit($data->nama_sampah, 20, '...') }}</td>
            <td>{{ Str::limit( $data->deskripsi_tipe, 20, '...')  }}</td>
            <td>
                <div class="btn-group">
                    <a href="/dashboard/action/sampah/kategori/delete/{{ $data->id }}" class="btn btn-danger">hapus</a>
                    <a href="/dashboard/sampah/kategori/edit/{{ $data->id }}" class="btn btn-warning">edit</a>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3" style="text-align: center">
                <p>Belum ada kategori sampah didalam sistem</p>
            </td>
        </tr>
    @endforelse
    </table>
@endsection
