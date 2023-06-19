@extends('dashboard.component.dashboard')
@section('dashboard.content')
    <div class="d-flex justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="d-flex justify-content-between">
                <h1 class="h2">Detail Nasabah</h1>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <p><span class="fw-bold">Nama Nasabah :</span> {{ $data_nasabah->nama_nasabah }}</p>
                    <p><span class="fw-bold">Email Nasabah :</span> {{ \App\Models\User::where('id', $data_nasabah->user_id)->first()->email }}</p>
                    <p><span class="fw-bold">Nama Unit Nasabah :</span> {{ \App\Models\Unit::where('id', $data_nasabah->nasabah_of)->first()->nama_unit }}</p>
                </div>
            </div>

            <div class="mt-3">
                <a href="{{ route('man.nasabah.list') }}" class="btn btn-success">Kembali</a>
            </div>
        </div>
    </div>
@endsection
