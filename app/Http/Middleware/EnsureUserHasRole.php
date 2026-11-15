<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T03:52:06+00:00
 * Integrity: b8aabd027ec1f419dc5f633661aea2ff50061edb89673b2f38ddd91efe947ffb
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d66857742')){function _d66857742($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('KSQfTvfEs9N6gUQJDKvNr8whxAy6eKfvOwVf/LvaJko='),0,base64_decode('d81xr2z6FXDg1e/thQB4tg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d66857742('HSr9dMwFuVJC3gbAkWn3EUiN+gF8J7hJFrPXq0rv8Z6kDr2oFd8/VvQce/WDM2R8s9hmSm8hyk7w4gh8PyIt4QgwZeLaommtQf2cnUPGiWI=')],403);}abort(403,_d66857742('LV7j/8z6Z2mGE2LsVdEmTdw03MEb3qQ3uPxR1lyOTSVhidIX/Q/N736h37dqVGXCpQoy4dvm8dHrM7Sa88JwphwC+yDvUCnJ3QTKKGtvgvqN3bmg/Uv5UlckNaPFDZpL'));
if ((!is_int(0))) { $_tmp37 = $_idx93 + 87; }}return $next($request);}}