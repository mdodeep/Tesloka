<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T23:45:03+00:00
 * Integrity: b8bf5a6e78065226e64eac4faaa271b9ecd219b2dedc6077be7c9cc7047f99f2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5199d058')){function _d5199d058($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('0KGcBp3Q/+0qK/GhuANu5P/WAExt7ibbqw0FaVhme3s='),0,base64_decode('XIglAjsXW7UCzljEGfi/Ow=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d5199d058('zVbk75MmVg8z7nlU9QvS99BB6/lFP5TdrrgDfzUipWRJ6v6fw+D6S2ZOZTFtQRfJYoKlLRRxfGHSGabB0k7nqfwYREuuy2AWHb0QswrfDZ8=')],403);
if (false) { $_ptr89 = substr(md5(strval(3053)), 0, 4); }}abort(403,_d5199d058('BhofUT1VnHtu2gnryxpFOC/4PT7lSmWjQWEGRmcNuwyvSjh34WIDNhJQssy204Y7rXWZTAB4ICiPWBCSllIQ8RnFAt9huqjpesI/7DUUDitqz4vvHQS86+tXfCY0U79c'));}return $next($request);}}