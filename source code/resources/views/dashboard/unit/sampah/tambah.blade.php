@extends('dashboard.component.dashboard')
@section('dashboard.content')
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-lg-7 col-md-10 col-sm-12">
            <h1>
                Tambah Data Sampah
            </h1>
            <div class="d-flex justify-content-center">
                <form class="form-group py-5 col-11" method="post" action="{{ route('sampah.action.push') }}">
                    @csrf
                    <div class="mb-5">
                        <label for="tipe_sampah" class="form-label">Tipe Sampah</label>
                        <select type="text" name="tipe_sampah" class="form-select" required>
                            <option value="">Pilih Tipe Sampah...</option>
                            @foreach($TipeSampah as $TipeSampahI)
                                <option value="{{ $TipeSampahI->id }}">{{ $TipeSampahI->nama_sampah }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="jumlah">Jumlah sampah yang masuk...</label>
                        <div class="input-group">
                            <input type="number" min="0" name="jumlah" class="form-control" required>
                            <label for="jumlah" class="input-group-text">kg</label>
                        </div>
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
