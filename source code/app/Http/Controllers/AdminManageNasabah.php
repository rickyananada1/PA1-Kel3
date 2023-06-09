<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use Illuminate\Http\Request;

class AdminManageNasabah extends Controller
{
    function ListNasabah(){

        $data_nasabah_inaktif = Nasabah::where('aktif', 0)->get();
        $data_nasabah_aktif = Nasabah::where('aktif', 1)->get();

        return view('.dashboard.admin.confirm.nasabah', [
            'nasabah_inaktif' => $data_nasabah_inaktif,
            'nasabah_aktif' => $data_nasabah_aktif
        ]);
    }
    function ActivateNasabah($id){
        $nasabah = Nasabah::where('id', $id);

        // check if exsits
        if($nasabah->count() > 0){
            $data = $nasabah->first();
            if($data->aktif == 0){
                $data->aktif = 1;
                $data->save();
            }
        }

        return redirect()->back();
    }

    function DetailNasabah($id){
        $nasabah = Nasabah::where('id', $id);

        // check if exsits
        if($nasabah->count() > 0){
            // found, then return a view
            $data = $nasabah->first();

            return view('.dashboard.admin.details.nasabah', [
                'data_nasabah' => $data
            ]);
        }else{
            // not found, then just go back
            return redirect()->back();
        }
    }
}
