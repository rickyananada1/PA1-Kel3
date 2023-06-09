@extends('dashboard.component.dashboard')
@section('dashboard.content')
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-lg-7 col-md-10 col-sm-12">
            <h1>
                Detail Data Sampah
            </h1>
            <div class="d-flex justify-content-center">
                <div class="form-group py-5 col-11">
                    <div class="mb-5">
                        <label for="jumlah">Jumlah sampah yang masuk...</label>
                        <input value="{{ $datasampah->amount }} kg" class="form-control" disabled>
                    </div>
                    <div class="mb-5">
                        <label for="jumlah">Tanggal data masuk...</label>
                        <input class="form-control" value="{{ $datasampah->created_at }}" disabled>
                    </div>
                    <div class="mb-5">
                        <label for="jumlah">Tanggal data dirubah...</label>
                        <input class="form-control" value="{{ $datasampah->updated_at }}" disabled>
                    </div>
                    <h2 class="h5 fw-bold">Informasi lanjutan mengenai sampah yang masuk</h2>
                    <div class="mt-2 mb-5">
                        <label for="tipe_sampah"  class="form-label">tipe Sampah</label>
                        <input class="form-control" value="{{ $datakategori->nama_sampah }}" disabled>
                    </div>
                    <div class="mt-2 mb-5">
                        <label for="tipe_sampah" class="form-label">deskripsi dari tipe sampah</label>
                        <textarea rows="10" class="form-control" disabled>{{ $datakategori->deskripsi_tipe }}</textarea>
                    </div>
                    <div class="mb-5">
                        <a href="{{ route('sampah.home') }}" class="btn btn-secondary">kembali ke data sampah</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
