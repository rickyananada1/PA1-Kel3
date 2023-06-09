<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Nasabah;
use App\Models\saldo;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserSetupController extends Controller
{

    public function setup($tipe){
        if(Auth::check()){
            $id = Auth::getUser()->getAuthIdentifier();
        }else{
            $id = -99;
        }


        return view("auth.setup", [
            "tipe" => $tipe,
            "unit" => Unit::all()->toArray()
        ]);
    }

    public function finalization(Request $request){
        $tipe = $request->tipe;

        switch($tipe){
            case 0:
                // validation!
                $request->validate([
                    'nama_unit' => ['required', 'string'],
                    'alamat_unit' => ['required', 'string'],
                    'kecamatan_unit' => ['required', 'string']
                ]);


                // set up user
                $user = User::create([
                    'email' => $request->session()->get('temp_user_credentials_email'),
                    'password' => $request->session()->get('temp_user_credentials_hashed_password'),
                    'tipe_akun' => null // first, we add it as null!
                ]);

                event(new Registered($user));
                Auth::login($user);


                // set-up unit
                // first, let's set the user's account type
                User::whereId($user->id)->update(["tipe_akun" => 0]);

                // then, we add row in unit
                Unit::create([
                    'nama_unit' => $request->nama_unit,
                    'alamat_unit' => $request->alamat_unit,
                    'kecamatan_unit' => $request->kecamatan_unit,
                    'user_id' => $user->id
                ]);

                $request->session()->forget(['temp_user_credentials_email', 'temp_user_credentials_hashed_password']);

                return redirect("/dashboard");

                break;
            case 1:

                // validate
                $request->validate([
                    'nama_nasabah' => ['required', 'string'],
                    'no_rekening' => ['required', 'integer'],
                    'alamat_nasabah' => ['required', 'string'],
                    'nik_nasabah' => ['required', 'integer'],
                    'nasabah_of' => ['required']
                ]);

                // set up user
                $user = User::create([
                    'email' => $request->session()->get('temp_user_credentials_email'),
                    'password' => $request->session()->get('temp_user_credentials_hashed_password'),
                    'tipe_akun' => null // first, we add it as null!
                ]);

                event(new Registered($user));
                Auth::login($user);

                // set-up nasabah
                // first, let's set the user's account type
                User::whereId($user->id)->update(["tipe_akun" => 1]);

                // then, we add row in nasabah
                $createNasabah = Nasabah::create([
                    'nama_nasabah' => $request->nama_nasabah,
                    'no_rekening' => $request->no_rekening,
                    'alamat_nasabah' => $request->alamat_nasabah,
                    'nik_nasabah' => $request->nik_nasabah,
                    'nasabah_of' => $request->nasabah_of,
                    'user_id' => $user->id
                ]);

                saldo::create([
                    'nasabah_id' => $createNasabah->id,
                    'saldo' => 0 // for starter let it zero!
                ]);

                $request->session()->forget(['temp_user_credentials_email', 'temp_user_credentials_hashed_password']);

                return redirect("/dashboard");

                break;
            default:
                return redirect("/");
                break;
        }

    }
}
