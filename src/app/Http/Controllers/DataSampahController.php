<?php

namespace App\Http\Controllers;

use App\Models\DataSampah;
use App\Models\TipeSampah;
use App\Models\Unit;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataSampahController extends Controller
{
    // kategori sampah
        /** PAGES */
        function ShowKategoriSampah(){
            return view(
                'dashboard.unit.sampah.kategori.home',
                [
                    'KategoriQueries' => TipeSampah::get()
                ]
            );
        }
        function TambahKategoriSampah(){
            return view(
                'dashboard.unit.sampah.kategori.tambah'
            );
        }
        function EditKategoriSampah($id){
            $data = TipeSampah::find($id)->first();

            return view(
                'dashboard.unit.sampah.kategori.edit',
                [
                    'dataLamaSampah' => $data,
                    'id' => $id
                ]
            );
        }

        /** ACTIONS */
        function pushKategoriSampah(Request $request){
            TipeSampah::create([
                'nama_sampah' => $request->nama_kategori,
                'deskripsi_tipe' => $request->deskripsi_kategori
            ]);

            return redirect(route('sampah.kategori.home'));
        }

        function updateKategoriSampah(Request $request, $id){
            $KategoriEdit = TipeSampah::find($id);

            $KategoriEdit->nama_sampah = $request->nama_kategori;
            $KategoriEdit->deskripsi_tipe = $request->deskripsi_kategori;
            $KategoriEdit->save();

            return redirect(route('sampah.kategori.home'));
        }

        function deleteKategoriSampah($id){
            $KategoriHapus = TipeSampah::find($id)->delete();
            return redirect(route('sampah.kategori.home'));
        }

    // sampah
        /** PAGES */
        function ShowDataSampah()
        {
            // find the userID!
            $unitID = Unit::where('user_id', Auth::user()->id)->first();
            $TrashData = DataSampah::where('unit_pelapor', $unitID->id)->get();

            return view(
                'dashboard.unit.sampah.home',
                [
                    'TrashDatas' => $TrashData
                ]
            );
        }

        function SubmitDataSampah(){
            $Kategoris = TipeSampah::get();
            return view('dashboard.unit.sampah.tambah',
            [
                'TipeSampah' => $Kategoris
            ]);
        }

        function EditDataSampah($id){
            $Kategoris = TipeSampah::get();
            $RecentData = DataSampah::find($id)->first() ;
            return view('dashboard.unit.sampah.edit',
                [
                    'id' => $id,
                    'TipeSampah' => $Kategoris,
                    'RecentData' => $RecentData
                ]);
        }

        /** ACTIONS */
        function pushDataSampah(Request $request){
            $unitID = Unit::where('user_id', Auth::user()->id)->first();
            $Buat = DataSampah::create([
                'tipe_sampah' => $request->tipe_sampah,
                'amount' => $request->jumlah,
                'unit_pelapor' => $unitID->id
            ]);

            return redirect(route('sampah.home'));
        }

        function deleteDataSampah($id){
            $HapusDataSampah = DataSampah::find($id)->delete();

            return redirect(route('sampah.home'));
        }

        function showDetailDataSampah($id){
            $GetDataSampah = DataSampah::find($id)->first();
            $GetKategoriDataSampah = TipeSampah::find($GetDataSampah->tipe_sampah)->first();

            return view('dashboard.unit.sampah.detail', [
                "datasampah" => $GetDataSampah,
                "datakategori" => $GetKategoriDataSampah
            ]);

        }

        function updateDataSampah($id, Request $request){
            $Edit = DataSampah::find($id);
            $Edit->tipe_sampah = $request->tipe_sampah;
            $Edit->amount = $request->jumlah;

            $Edit->save();

            return redirect(route("sampah.home"));
        }
}
