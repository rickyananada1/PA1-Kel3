<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\saldo;
use App\Models\saldo_history;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;


class DataSaldoController extends Controller
{
    // untuk nasabah
    function ShowSaldoInfo(){
        $idNasabah = Nasabah::where('user_id', Auth::user()->id)->first()->id;
        // get saldo information
        $saldo = saldo::where('nasabah_id', $idNasabah)->first();
        $saldoHistory = saldo_history::where('saldo_id', $saldo->id)->get();

        return view('.dashboard.nasabah.saldohistories',
        [
            'saldo' => $saldo->saldo,
            'saldoHistory' => $saldoHistory
        ]);
    }

    // untuk unit
    function ShowNasabahLists(){
        // get the unit id first
        $unit_id = Unit::where('user_id', Auth::user()->id)->first()->id;
        // get nasabah ids that registered to said unit
        $nasabahIDs = Nasabah::where('nasabah_of', $unit_id)->get();

        // and let 'em printed in the page
        return view('.dashboard.unit.saldo.home', [
            'nasabah' => $nasabahIDs
        ]);
    }

    function ShowNasabahDetail($id){
        $unit_id = Unit::where('user_id', Auth::user()->id)->first()->id;
        $nasabahDetail = (Nasabah::find($id)->nasabah_of == $unit_id) ? Nasabah::where('id', $id)->first() : false;

        if($nasabahDetail == false)
            return redirect(route('nasabah.list'));

        // data saldo
        $jSaldo = \App\Models\saldo::where("nasabah_id", $nasabahDetail->id)->first();

        return view('.dashboard.unit.saldo.detail', [
            'nasabah' => $nasabahDetail,
            'jumlahSaldo' => $jSaldo->saldo,
        ]);
    }

    function HalamanTambahSaldo(){

    }

    function DoDeposit($id, Request $request){
        $unit_id = Unit::where('user_id', Auth::user()->id)->first()->id;
        $nasabahDetail = (Nasabah::find($id)->nasabah_of == $unit_id) ? Nasabah::where('id', $id)->first() : false;

        if($nasabahDetail == false)
            return redirect(route('nasabah.list'));

        // find current saldo!
        $currentSaldo = saldo::where('nasabah_id', $nasabahDetail->id)->first()->saldo;

        // add saldo!
        $saldo = saldo::where('nasabah_id', $nasabahDetail->id);

        $saldo->update(['saldo' => ($currentSaldo + $request->jumlah)]);

        saldo_history::create([
            'saldo_id' => $saldo->first()->id,
            'method' => 'deposit',
            'jumlah_transaksi' => $request->jumlah
        ]);


        return redirect(route('nasabah.list'));
    }

    function DoTarik($id, Request $request){
        $unit_id = Unit::where('user_id', Auth::user()->id)->first()->id;
        $nasabahDetail = (Nasabah::find($id)->nasabah_of == $unit_id) ? Nasabah::where('id', $id)->first() : false;

        if($nasabahDetail == false)
            return redirect(route('nasabah.list'));

        // find current saldo!
        $currentSaldo = saldo::where('nasabah_id', $nasabahDetail->id)->first()->saldo;

        if($currentSaldo-$request->jumlah >= 0){
            $addSaldo = saldo::where('nasabah_id', $nasabahDetail->id);

            $addSaldo->update(['saldo' => ($currentSaldo - $request->jumlah)]); // reduce saldo

            saldo_history::create([
                'saldo_id' => $addSaldo->first()->id,
                'method' => 'tarik',
                'jumlah_transaksi' => $request->jumlah
            ]);
        }

        return redirect(route('nasabah.list'));
    }

    function ShowDepositForm($id){
        return view('.dashboard.unit.saldo.deposit', [
            'id' => $id
        ]);
    }
    function ShowTarikForm($id){
        return view('.dashboard.unit.saldo.tarik', [
            'id' => $id
        ]);
    }
}
