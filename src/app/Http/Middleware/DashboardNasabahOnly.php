<?php

namespace App\Http\Middleware;

use App\Models\Nasabah;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardNasabahOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            $id = Auth::getUser()->getAuthIdentifier();
        }else{
            $id = 0;
        }

        if((Nasabah::where('user_id', $id)->first() == null) || (User::find($id)->tipe_akun != 1)){
            // yeeted back to the home dashboard page if you are not a nasabah
            return redirect(route('dashboard'));
//            return redirect(route('dashboard'));
        }else{
            return $next($request);
        }
    }
}
