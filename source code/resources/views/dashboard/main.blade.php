@extends('dashboard.component.dashboard')
@section('dashboard.content')
    @switch(\Illuminate\Support\Facades\Auth::user()->tipe_akun)
        @case(0)

            <div class="my-2">
                <h1 class="h2 fw-bold">Halo! Selamat Datang!</h1>
            </div>
            <div class="row mt-4">
                <div class="mb-5">
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <h2 class="h3">Informasi <span class="fw-bold">{{ $data_unit->nama_unit }}</span></h2>
                            <div class="row">

                                <div class="col-lg-6 mt-2">
                                    <section class="card shadow-sm">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <h3 class="h5">jumlah nasabah</h3>
                                            <p><span class="display-3">{{ $jumlah_nasabah }}</span></p>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-lg-6 mt-2">
                                    <section class="card shadow-sm">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <h3 class="h5">jumlah postingan <br> blog</h3>
                                            <p><span class="display-3">{{ $jumlah_blog }}</span></p>
                                        </div>
                                    </section>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm mt-4">
                        <div class="card-body p-4">
                            <h2 class="h3 mb-3">aksi Cepat</h2>

                            <div class="mb-3">
                                <div class="card shadow-sm">
                                    <div class="card-body ">
                                        <p class="fast-action">
                                            <a href="{{ route('sampah.tambah') }}" class="link-success">Tambahkan data sampah</a>
                                        </p>
                                        <p class="fast-action">
                                            <a href="{{ route('blog.write') }}" class="link-success">Tambahkan blog {{ $data_unit->nama_unit }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="card shadow-sm">
                                    <div class="card-body ">
                                        <h3 class="h5 fw-bold">informasi nasabah</h3>
                                        <hr>
                                        @forelse($nasabah as $satunasabah)
                                            <div class="fast-action" class=" d-flex justify-content-between align-items-center">
                                                <span>{{ $satunasabah->nama_nasabah }}</span> &nbsp;
                                                <a href="{{ route('nasabah.detail', ['id' => $satunasabah->id]) }}" class="link link-success">lihat detail pengguna</a>
                                            </div>
                                        @empty
                                            <p class="fast-action"><i>anda tidak memiliki nasabah</i></p>
                                        @endforelse
                                        <hr>
                                        <p class="fast-action">
                                            <a href="{{ route('nasabah.list') }}" class="btn btn-success">
                                                halaman lengkap nasabah
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        @break
        @case(1)

            <div class="my-2">
                <h1 class="h2 fw-bold">Halo! Selamat Datang!</h1>
            </div>
            <div class="row mt-4 d-flex justify-content-center">
                <div class="mb-5">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="p-3">
                                <h2 class="h3">Informasi Anda</h2>

                                <div class="row mt-3">

                                    <div class="col-md-6 col-lg-6">
                                        <div class="card shadow-sm">
                                            <div class="card-body">
                                                <h3 class="h6">jumlah saldo saat ini</h3>
                                                <p class="h4 fw-bolder">
                                                    <span>Rp.</span>
                                                    <span>{{ $data_saldo }},-</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-6">
                                        <div class="card shadow-sm">
                                            <div class="card-body">
                                                <h3 class="h6">Anda merupakan nasabah dari</h3>
                                                <p class="h4 fw-bolder">
                                                    <span>{{ \App\Models\Unit::where('id', $data_nasabah->nasabah_of)->first()->nama_unit }}</span>
                                                </p>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="p-3">
                                <h2 class="h3">Detail Akun Anda</h2>
                                <div class="pt-2">
                                    <p class="fast-action">
                                        <span> <b>Tanggal registrasi : </b> </span>
                                        <span> {{ $waktu_masuk }} </span>
                                    </p>
                                    <p class="fast-action">
                                        <span> <b>Alamat Email : </b> </span>
                                        <span> {{ \Illuminate\Support\Facades\Auth::user()->email }} </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @break

            @case('2')

            <div class="my-2">
                <h1 class="h2 fw-bold">Halo Administrator!</h1>
            </div>
            <div class="row mt-4 d-flex justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12 mb-5">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="p-3">
                                <h2 class="h5">Manajemen pengguna</h2>

                                <div class="row mt-3">

                                    <div class="col-md-6 col-lg-6">
                                            <div class="card shadow-sm">
                                                <div class="card-body">
                                                    <p class="m-0 text-center">
                                                        <a href="{{ route('man.nasabah.list') }}" class="fw-bold link-success">
                                                            {{ __('nasabah') }}
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="col-md-6 col-lg-6">
                                        <a class="el-link" href="#">
                                            <div class="card shadow-sm">
                                                <div class="card-body">
                                                    <p class="m-0 text-center">
                                                        <a href="{{ route('man.unit.list') }}" class="fw-bold link-success">
                                                            {{ __('bank sampah') }}
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 mb-5">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="p-3">
                                <h2 class="h5">Statistik Pengguna</h2>

                                <div class="row mt-3">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="card shadow-sm">
                                            <div class="card-body">
                                                <h3 class="h6">{{ __('Jumlah pengguna Nasabah') }}</h3>
                                                <p class="m-0 ">
                                                    <span class="fw-bolder">{{ \App\Models\Nasabah::where('aktif', 1)->count() }}</span> pengguna aktif dari <span class="fw-bolder">{{ \App\Models\Nasabah::all()->count() }}</span> pengguna
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-6">
                                        <div class="card shadow-sm">
                                            <div class="card-body">
                                                <h3 class="h6">{{ __('Jumlah pengguna Bank Sampah') }}</h3>
                                                <p class="m-0 ">
                                                    <span class="fw-bolder">{{ \App\Models\Unit::where('aktif', 1)->count() }}</span> pengguna aktif dari <span class="fw-bolder">{{ \App\Models\Unit::all()->count() }}</span> pengguna
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @break
        @default
        @break
    @endswitch
@endsection
