@extends('dashboard.component.dashboard')
@section('dashboard.content')
    <div class="d-flex justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="d-flex justify-content-between">
                <h1 class="h2">daftar pengguna bank sampah</h1>
            </div>

            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="h5 fw-bold py-2 text-center">daftar bank sampah yang belum aktif</h2>
                    <table class="table mt-4">
                        <tr>
                            <th>
                                nama bank sampah
                            </th>
                            <th>
                                waktu mendaftar
                            </th>
                            <th>
                                aksi
                            </th>
                        </tr>
                        @forelse($unit_inaktif as $ui)
                            <tr>
                                <td>
                                    {{ $ui->nama_unit }}
                                </td>
                                <td>
                                    {{ $ui->created_at }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('man.unit.detail', ['id' => $ui->id]) }}" class="btn btn-sm btn-primary">detail</a>
                                        <a href="{{ route('man.unit.activate', ['id' => $ui->id]) }}" class="btn btn-sm btn-success">aktifkan</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <p class="py-3 text-center">tidak ada pengguna disini</p>
                                </td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>


            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="h5 fw-bold py-2 text-center">daftar bank yang sudah aktif</h2>
                    <table class="table mt-4">
                        <tr>
                            <th>
                                nama bank sampah
                            </th>
                            <th>
                                waktu mendaftar
                            </th>
                            <th>
                                aksi
                            </th>
                        </tr>
                        @forelse($unit_aktif as $ua)
                            <tr>
                                <td>
                                    {{ $ua->nama_unit }}
                                </td>
                                <td>
                                    {{ $ua->created_at }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('man.unit.detail', ['id' => $ua->id]) }}" class="btn btn-sm btn-primary">detail</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <p class="py-3 text-center">tidak ada pengguna disini</p>
                                </td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>

            <div class="mt-3">
                <a href="{{ route('dashboard') }}" class="btn btn-success">kembali</a>
            </div>
        </div>
    </div>
@endsection
