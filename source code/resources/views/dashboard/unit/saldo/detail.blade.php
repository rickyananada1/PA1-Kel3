@extends('dashboard.component.dashboard')
@section('dashboard.content')
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-lg-7 col-md-10 col-sm-12">
            <h1 >
                <span class="h4"> Informasi Nasabah </span> <br>{{ explode(" ", $nasabah->nama_nasabah)[0] }}
            </h1>
            <div class="d-flex justify-content-center">
                <div class="form-group py-5 col-11">
                    <div class="mb-5">
                        <label>Nama lengkap nasabah</label>
                        <input value="{{ $nasabah->nama_nasabah }}" class="form-control" disabled>
                    </div>
                    <div class="mb-5">
                        <label>Jumlah saldo nasabah</label>
                        <input value="{{ __("Rp").$jumlahSaldo }}" class="form-control" disabled>
                    </div>
                    <div class="mb-5">
                        <label for="jumlah">Nomor rekening nasabah</label>
                        <input value="{{ $nasabah->no_rekening }}" class="form-control" disabled>
                    </div>
                    <div class="mb-5">
                        <label for="jumlah">Alamat nasabah</label>
                        <input value="{{ $nasabah->alamat_nasabah }}" class="form-control" disabled>
                    </div>
                    <div class="mb-5">
                        <label for="jumlah">Tanggal bergabung menjad nasabah</label>
                        <input value="{{ $nasabah->created_at }}" class="form-control" disabled>
                    </div>
                    <div class="mb-5">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">kembali ke data sampah</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
