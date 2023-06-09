<?php

namespace App\Http\Middleware;

use App\Models\Unit;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardUnitOnly
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
        $user = Auth::user();

        if((Unit::where('user_id', $user->id)->first() == null) || $user->tipe_akun != 0){
            return redirect(route('dashboard'));
        }else{
            return $next($request);
        }

    }
}
