<?php

namespace App\Http\Middleware;

use App\Models\Nasabah;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardAdminOnly
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

        if((Auth::user()->tipe_akun == 2 && Auth::user()->id == 99)){
            return $next($request);
        }else{
            return redirect(route('dashboard'));
        }
    }
}
