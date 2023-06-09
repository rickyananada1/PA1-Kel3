<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Unit;
use Illuminate\Http\Request;

class AdminManageUnit extends Controller
{
    function ListUnit(){
        $data_unit = [
            "aktif" => Unit::where('aktif', 1)->get(),
            "inaktif" => Unit::where('aktif', 0)->get()
        ];

        return view('.dashboard.admin.confirm.unit', [
            'unit_inaktif' => $data_unit["inaktif"],
            'unit_aktif' => $data_unit["aktif"]
        ]);
    }

    function DetailUnit($id){
        $data_unit = Unit::where('id', $id)->first();

        return view('.dashboard.admin.details.unit', [
            'data_unit' => $data_unit
        ]);
    }

    function ActivateUnit($id){
        $unit = Unit::where('id', $id);

        if($unit->count() > 0){
            $data = $unit->first();
            if($data->aktif == 0){
                $data->aktif = 1;
                $data->save();
            }
        }

        return redirect()->back();
    }
}
