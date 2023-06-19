@extends('dashboard.component.dashboard')
@section('dashboard.content')
    <div class="d-flex justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="d-flex justify-content-between">
                <h1 class="h2">Detail Unit</h1>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <p><span class="fw-bold">Nama Nasabah :</span> {{ $data_unit->nama_unit }}</p>
                    <p><span class="fw-bold">Email Nasabah :</span> {{ \App\Models\User::where('id', $data_unit->user_id)->first()->email }}</p>
                </div>
            </div>

            <div class="mt-3">
                <a href="{{ route('man.unit.list') }}" class="btn btn-success">Kembali</a>
            </div>
        </div>
    </div>
@endsection
