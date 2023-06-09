@extends('dashboard.component.dashboard')
@section('dashboard.content')
    <div class="d-flex justify-content-between">
        <h1>Daftar Blog</h1>
        <a class="btn btn-success" href="{{ route('blog.write') }}">
            Tulis sesuatu
        </a>
    </div>
    <table class="table mt-4">
        <tr>
            <th>
                judul blog
            </th>
            <th>
                kategori
            </th>
            <th>
                tanggal unggah
            </th>
            <th>
                aksi
            </th>
        </tr>
        @forelse($daftarBlog as $blog)
            <tr>
                <td>
                    {{ $blog->judul_blog }}
                </td>
                <td>
                    {{ \App\Models\KategoriBlog::where('id', $blog->kategori)->first()->nama_kategori }}
                </td>
                <td>
                    {{ $blog->created_at }}
                </td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('blog.view', ['id' => $blog->id]) }}" class="btn btn-primary">lihat</a>
                        <a href="{{ route('blog.edit', ['id' => $blog->id])  }}" class="btn btn-warning">edit</a>
                        <a href="{{ route('blog.action.destroy', ['id' => $blog->id]) }}" class="btn btn-danger">hapus</a>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
               <td colspan="4">
                   <p class="py-3 text-center">tidak ada blog disini</p>
               </td>
            </tr>
        @endforelse
    </table>
@endsection
