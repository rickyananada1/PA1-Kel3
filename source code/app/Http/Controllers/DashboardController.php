<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Nasabah;
use App\Models\saldo;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function MainPage(){
        // first find the account type
        $returning = [];
        switch(Auth::user()->tipe_akun){
            case 0 :

                // getting unit id
                $unit = Unit::where('user_id', Auth::user()->id)->first();
                // jumlah nasabah
                $jumlahNasabah = Nasabah::where('nasabah_of', $unit->id)->count();
                $jumlahBlog = Blog::where('author', $unit->id)->count();

                $Nasabah = Nasabah::where('nasabah_of', $unit->id)->limit(3)->get();


                $returning = [
                    'jumlah_nasabah' => $jumlahNasabah,
                    'jumlah_blog' => $jumlahBlog,
                    'data_unit' => $unit,
                    'nasabah' => $Nasabah
                ];

                break;
            case 1 :

                $nasabah = Nasabah::where('user_id', Auth::user()->id)->first();
                // jumlah saldo
                $datasaldo = saldo::where('nasabah_id', $nasabah->id)->first(); // ngambil data saldo!
                $dt = new \DateTime(Auth::user()->created_at);
                $waktumasuk = $dt->format('Y m d');

                $returning = [
                    'data_nasabah' => $nasabah,
                    'data_saldo' => $datasaldo->saldo,
                    'waktu_masuk' => $waktumasuk
                ];
                break;
            default:
                break;
        }

        return view('.dashboard.main', $returning);
    }
}
