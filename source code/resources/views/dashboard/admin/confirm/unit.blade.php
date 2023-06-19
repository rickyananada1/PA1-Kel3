@extends('dashboard.component.dashboard')
@section('dashboard.content')
    <div class="d-flex justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="d-flex justify-content-between">
                <h1 class="h2">Daftar Pengguna Bank Sampah</h1>
            </div>

            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="h5 fw-bold py-2 text-center">Daftar Bank Sampah Yang Belum Aktif</h2>
                    <table class="table mt-4">
                        <tr>
                            <th>
                                Nama Bank Sampah
                            </th>
                            <th>
                                Waktu Mendaftar
                            </th>
                            <th>
                                Aksi
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
                                        <a href="{{ route('man.unit.detail', ['id' => $ui->id]) }}" class="btn btn-sm btn-primary">Detail</a>
                                        <a href="{{ route('man.unit.activate', ['id' => $ui->id]) }}" class="btn btn-sm btn-success">Aktifkan</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <p class="py-3 text-center">Tidak Ada Pengguna Disini</p>
                                </td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>


            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="h5 fw-bold py-2 text-center">Daftar Bank Yang Sudah Aktif</h2>
                    <table class="table mt-4">
                        <tr>
                            <th>
                                Nama Bank Sampah
                            </th>
                            <th>
                                Waktu Mendaftar
                            </th>
                            <th>
                                Aksi
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
                                        <a href="{{ route('man.unit.detail', ['id' => $ua->id]) }}" class="btn btn-sm btn-primary">Detail</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <p class="py-3 text-center">Tidak Ada Pengguna Disini</p>
                                </td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>

            <div class="mt-3">
                <a href="{{ route('dashboard') }}" class="btn btn-success">Kembali</a>
            </div>
        </div>
    </div>
@endsection
