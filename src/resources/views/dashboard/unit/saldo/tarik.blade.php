@extends('dashboard.component.dashboard')
@section('dashboard.content')
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-lg-7 col-md-10 col-sm-12">
            <h1>
                formulir tarik
            </h1>
            <div class="d-flex justify-content-center">
                <form class="form-group py-5 col-11" method="post" action="/dashboard/saldo/tarik/{{$id}}">
                    @csrf
                    <div class="mb-5">
                        <label for="jumlah">Jumlah saldo yang ditarik...</label>
                        <div class="input-group">
                            <label class="input-group-text">Rp</label>
                            <input type="number" min="0" name="jumlah" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-5">
                        <input type="submit" value="catat" class="btn btn-success">
                        <a href="/dashboard/nasabah" class="btn btn-secondary">kembali ke halaman nasabah</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
