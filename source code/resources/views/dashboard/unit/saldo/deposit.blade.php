@extends('dashboard.component.dashboard')
@section('dashboard.content')
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-12">
            <h1>
                Deposit Saldo
            </h1>
            <div class="d-flex justify-content-center">
                <form class="form-group py-5 col-11" method="post" action="/dashboard/saldo/deposit/{{$id}}">
                    @csrf
                    <div class="mb-5">
                        <label for="jumlah">Jumlah saldo yang dideposit...</label>
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
