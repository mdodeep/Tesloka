<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T12:00:09+00:00
 * Integrity: 62cc99f0674a100fbafa818261736a32373c8a2eee231e5285bfc54cf0a56681
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5b5d0874')){function _d5b5d0874($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('KhetSy1yedaZEyY0+RHTATZ8pOXSDRJK2wtBrWsBJZ4='),0,base64_decode('iMw/h9RwmCGciXHCaPVRqg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d5b5d0874('/e4FxAiLc9HtQl1ZVPdJfYqD95PU2NKBlw7sKXwTY4aKaZw0+WmJs2ESBTVP8IqZBGWS5tCH2dlcbCfU1gIm8clJd/9AQsQfiMfQn/x/+Ao=')],403);}abort(403,_d5b5d0874('uPRM2vPM5dY4onXr26TqDsNf8+sjDbCW8UbpAYcIRYwfTxBxEz5+g1cQi4IxJ7xm4RBjIqbQOmoMalAWVpQnev60VeBEh78cQcmx2JFJdOQ2p4pDHv1UWB7V62fpsORn'));}return $next($request);}}