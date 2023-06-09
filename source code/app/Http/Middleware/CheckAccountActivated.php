<?php

namespace App\Http\Middleware;

use App\Models\Nasabah;
use App\Models\Unit;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckAccountActivated
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
        $authed = Auth::user();

        switch ($authed->tipe_akun){
            case 0: // unit

                if(Unit::where('user_id', $authed->id)->first()->aktif != 1){
                    return redirect()->route('misc.account_not_activated');
                }else{
                    return $next($request);
                }
                break;
            case 1: // nasabah

                if(Nasabah::where('user_id', $authed->id)->first()->aktif != 1){
                    return redirect()->route('misc.account_not_activated');
                }else{
                    return $next($request);
                }
                break;
            default:
                return $next($request);
                break;
        }
    }
}
