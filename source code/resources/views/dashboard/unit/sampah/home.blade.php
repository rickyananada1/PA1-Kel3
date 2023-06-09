@extends('dashboard.component.dashboard')
@section('dashboard.content')
    <div>
        <div class="d-flex justify-content-between">
            <h1 class="h2 fw-bold">Data Sampah</h1>
            <a href="{{ route('sampah.tambah') }}" class="btn btn-success">catat sampah masuk</a></div>
    </div>
    <div>
        <table class="table mt-5">
            <tr>
                <th>
                    Tipe Sampah
                </th>
                <th>
                    Jumlah
                </th>
                <th>
                    Waktu data masuk
                </th>
                <th>
                    Waktu terakhir edit
                </th>
                <th>
                    Aksi
                </th>
            </tr>
            @forelse($TrashDatas as $data)
                <tr>
                    <td>{{ Str::limit(\App\Models\TipeSampah::find($data->tipe_sampah)->nama_sampah, 20, '...') }}</td>
                    <td>{{ $data->amount }} kg </td>
                    <td>{{ $data->created_at }}</td>
                    <td>{{ $data->updated_at }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('sampah.detail', ['id' => $data->id]) }}" class="btn btn-primary">detail</a>
                            <a href="{{ route('sampah.edit', ['id' => $data->id]) }}" class="btn btn-warning">edit</a>
                            <a href="{{ route('sampah.action.delete', ['id' => $data->id]) }}" class="btn btn-danger">hapus</a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center">
                        <p>Belum ada catatan sampah!</p>
                    </td>
                </tr>
            @endforelse
        </table>
    </div>
    </div>
@endsection
