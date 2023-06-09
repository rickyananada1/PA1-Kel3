@extends('dashboard.component.dashboard')
@section('dashboard.content')
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-lg-7 col-md-10 col-sm-12">
            <h1>
                Tambah Kategori Sampah
            </h1>
            <div class="d-flex justify-content-center">
                <form class="form-group py-5 col-11" method="post" action="{{ route('sampah.kategori.action.push') }}">
                    @csrf
                    <div class="mb-5">
                        <label for="tipe_sampah" class="form-label">Nama Kategori Sampah</label>
                        <input type="text" name="nama_kategori" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="deskripsi_kategori">Deskripsi Kategori...</label>
                        <textarea rows="10" name="deskripsi_kategori" class="form-control" required></textarea>
                    </div>
                    <div class="mb-5">
                        <input type="submit" value="catat" class="btn btn-success">
                        <a href="/dashboard" class="btn btn-secondary">kembali ke dashboard</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
