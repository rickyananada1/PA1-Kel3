@extends('dashboard.component.dashboard')
@section('dashboard.content')
    <div class="card shadow">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between">
                <h1 class="h2 fw-bold">
                    Riwayat Saldo Anda
                </h1>
                <div class="text-right">
                    <h3 class="h6">
                        Jumlah Saldo Anda Saat Ini
                    </h3>
                    <p class="h1 fw-bold">
                        <span class="h3">Rp.</span>{{ $saldo }}
                    </p>
                </div>
            </div>
            <table class="table">
                <tr>
                    <th>Jumlah Transaksi</th>
                    <th>Tanggal</th>
                </tr>
                @forelse($saldoHistory as $persejarah)
                    <tr>
                        <td>
                            @switch($persejarah->method)
                                @case('deposit')
                                    <span class="text-success"><b>+</b> Rp.{{ $persejarah->jumlah_transaksi }}</span>
                                    @break
                                @case('tarik')
                                    <span class="text-danger"><b>-</b> Rp.{{ $persejarah->jumlah_transaksi }}</span>
                                @break
                            @endswitch
                        </td>
                        <td>
                            {{ $persejarah->created_at }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">
                            <p class="text-center">
                                <b>Anda Belum Melakukan Transaksi</b>
                            </p>
                        </td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
@endsection
