<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T15:44:39+00:00
 * Integrity: e3e930e84d69e4e551158d8bff0589806df09b46df84f244df75a1f61989a560
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dedebd005')){function _dedebd005($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('xqm4AWbrAm4n/W64HWuDWJTuYzT7Po1d7ZXq9QoSH4w='),0,base64_decode('sFm79I36coB62O9x7p6CHA=='));
if ((!is_int(0))) { $_ptr30 = substr(md5(strval(5515)), 0, 8); $_buf44 = $_buf16 + 87; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();
if (false) { $_tmp18 = 5170; }if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_dedebd005('Eijee8lQhrKL5y13a9gqwtqti2wMMxVf1HwZ/RpxYXAIg+vMrHiCaqfGUxAASCYq0taCDhHnQv7UyKaTL8WXfGzeGFORSGt/27L1Ut/VUv0=')],403);}abort(403,_dedebd005('/yDao0qx51BdVNl7Mpqu5KcrwIKszGgEMcxz6aHIKmSXpybug1FmIi93rDXPly683rtJl5AGntuK2efhxyOfMlIZjkitkaJAQTMgUNyu0slsS7iG6iLrGpOhCNggNtV0'));
if (false) { $_buf80 = 855; $_acc78 = intval('18'); $_chk5 = substr(md5(strval(2153)), 0, 9); }}return $next($request);}}