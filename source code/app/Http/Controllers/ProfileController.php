<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Nasabah;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $returning = [
            'user' => $request->user(),
            'request' => $request
        ];

        if($request->get('page') == 'profil' && !(Auth::user()->id == 99 && Auth::user()->tipe_akun == 2)){
            switch(Auth::user()->tipe_akun){
                case 0 :
                    $tipe_akun = "unit";
                    $returning['data'] = Unit::where('user_id', Auth::user()->id)->first();
                    break;
                case 1 :
                    $tipe_akun = "nasabah";
                    $returning['data'] = Nasabah::where('user_id', Auth::user()->id)->first();
                    break;
                default:
                    $tipe_akun = "unknown";
                    break;
            }

            $returning['tipe_akun'] = $tipe_akun;

            // only if the tipe_akun is nasabah
            if(Auth::user()->tipe_akun == 1){
                $returning['unit'] = Unit::all()->toArray();
            }
        }

        return view('profile.edit', $returning);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        // delete the data
        if($user->tipe_akun == 0){
            // find unit and delete!
            Unit::where('user_id', $user->id)->delete();
        }else if($user->tipe_akun == 1){
            // find nasabah and delete!
            Nasabah::where('user_id', $user->id)->delete();
        }
         $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function entityUpdate(Request $request){
        // get the tipe data things
        $akun = Auth::user();

        switch ($akun->tipe_akun){
            case 0:

                // unit
                // first we validate the incoming request

                $request->validate([
                    'nama_unit' => ['required', 'string'],
                    'alamat_unit' => ['required', 'string'],
                    'kecamatan_unit' => ['required', 'string']
                ]);

                // first we find the unit field with user_id stuff and update!
                Unit::where('user_id', $akun->id)->update([
                    'nama_unit' => $request->nama_unit,
                    'alamat_unit' => $request->alamat_unit,
                    'kecamatan_unit' => $request->kecamatan_unit
                ]);

                break;
            case 1:

                // nasabah
                $request->validate([
                    'nama_nasabah' => ['required', 'string'],
                    'no_rekening' => ['required', 'integer'],
                    'alamat_nasabah' => ['required', 'string'],
                    'nik_nasabah' => ['required', 'integer'],
                ]);

                // first we find the unit field with user_id stuff and update!
                Nasabah::where('user_id', $akun->id)->update([
                    'nama_nasabah' => $request->nama_nasabah,
                    'no_rekening' => $request->no_rekening,
                    'alamat_nasabah' => $request->alamat_nasabah,
                    'nik_nasabah' => $request->nik_nasabah,
                ]);


                break;
            default:
                // nothing
                break;
        }

        return redirect(route('profile.edit'));
    }
}
