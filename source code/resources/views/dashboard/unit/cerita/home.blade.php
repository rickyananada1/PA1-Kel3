@extends('dashboard.component.dashboard')
@section('dashboard.content')
    <div class="d-flex justify-content-between">
        <h1>Daftar Cerita</h1>
        <a class="btn btn-success" href="{{ route('cerita.write') }}">
            Tulis sesuatu
        </a>
    </div>
    <table class="table mt-4">
        <tr>
            <th>
                judul cerita
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
        @forelse($daftarCerita as $cerita)
            <tr>
                <td>
                    {{ $cerita->judul_cerita }}
                </td>
                <td>
                    {{ \App\Models\KategoriCerita::where('id', $cerita->kategori)->first()->nama_kategori }}
                </td>
                <td>
                    {{ $cerita->created_at }}
                </td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('cerita.view', ['id' => $cerita->id]) }}" class="btn btn-primary">lihat</a>
                        <a href="{{ route('cerita.edit', ['id' => $cerita->id])  }}" class="btn btn-warning">edit</a>
                        <a href="{{ route('cerita.action.destroy', ['id' => $cerita->id]) }}" class="btn btn-danger">hapus</a>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
               <td colspan="4">
                   <p class="py-3 text-center">tidak ada cerita disini</p>
               </td>
            </tr>
        @endforelse
    </table>
@endsection
