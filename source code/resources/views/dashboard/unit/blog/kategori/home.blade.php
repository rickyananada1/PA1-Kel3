@extends('dashboard.component.dashboard')
@section('dashboard.content')
    <div class="d-flex justify-content-between">
        <h1>Daftar Kategori Blog</h1>
        <a href="/dashboard/blog/kategori/tambah" class="btn btn-success">Tambah kategori Blog</a>
    </div>
    <table class="table mt-4">
        <tr>
            <th>
                Kategori
            </th>
            <th>
                Aksi
            </th>
        </tr>
        @forelse($DaftarKategori as $kategori)
            <tr>
                <td>{{ $kategori->nama_kategori }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('blog.kategori.edit', ['id' => $kategori->id]) }}" class="btn btn-primary">edit</a>
                        <a href="{{ route('blog.kategori.action.destroy', ['id' => $kategori->id ]) }}" class="btn btn-danger">hapus</a>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
               <td rowspan="2" style="text-align: center">
                   <p>tidak ada kategori blog disini</p>
               </td>
            </tr>
        @endforelse
    </table>
@endsection
