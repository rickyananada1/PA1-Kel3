<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TurnstileCheck
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
        // check chaptca, prevent bot!

        $chaptca = $request->post('cf-turnstile-response');
        $secretKey = env("TURNSTILE_SERVER");
        $ip = $_SERVER['REMOTE_ADDR'];

        $url_path = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';
        $data = array(
            'secret' => $secretKey,
            'response' => $chaptca,
            'remoteip' => $ip
        );
        $opt = array(
            'http' => array(
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                    "Content-Length: ".strlen(http_build_query($data))."\r\n".
                    "User-Agent:MyAgent/1.0\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );

        $stream = stream_context_create($opt);
        $res = file_get_contents($url_path, false, $stream);

        $response = $res;
        $responseKeys = json_decode($response, true);

        if(intval($responseKeys['success']) !== 1){
            return redirect(route('register'));
        }else{
            return $next($request);
        }
    }
}
