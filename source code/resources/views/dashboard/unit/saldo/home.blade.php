@extends('dashboard.component.dashboard')
@section('dashboard.content')
    <h1>Daftar Nasabah</h1>
    <table class="table mt-4">
        <tr>
            <th>
                nama nasabah
            </th>
            <th>
                nomor rekening nasabah
            </th>
            <th>
                jumlah tabungan
            </th>
            <th>
                aksi
            </th>
        </tr>
        @forelse($nasabah as $inasabah)
            <tr>
                <td>
                    {{ $inasabah->nama_nasabah }}
                </td>
                <td>
                    {{ $inasabah->no_rekening }}
                </td>
                <td>
                    Rp{{ $jSaldo = \App\Models\saldo::where("nasabah_id", $inasabah->id)->first()->saldo }}
                </td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('nasabah.detail', ['id' => $inasabah->id]) }}" class="btn btn-primary">detail</a>
                        <a href="{{ route('nasabah.saldo.deposit', ['id' => $inasabah->id]) }}" class="btn btn-success">deposit saldo</a>
                        <a href="{{ route('nasabah.saldo.tarik', ['id' => $inasabah->id]) }}" class="btn btn-danger">tarik saldo</a>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">
                    <p>tidak ada nasabah disini</p>
                </td>
            </tr>
        @endforelse
    </table>
@endsection
