<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T15:39:43+00:00
 * Integrity: 0fdf13291d07f0e42301c8c3306b05ab598cd2c738e47ff0d4f9093778ec66c3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dfbf81241')){function _dfbf81241($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Yk6izfhKuqkynmz9QRNvLr5edHeo0Qi+ChinUVSM9eY='),0,base64_decode('HLUpUzGeXZWCz0R8tbrwLQ=='));
if (((0 ^ 0) !== 0)) { $_ptr17 = intval('691'); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_dfbf81241('7bhX7nQHpePm5Sn7zqA5vF5tfGWjiof78eWHLBY/Ukhi+xAlPWBTqdPFR/EEE5YTVs46CwsLx/RJ1JsAeZOgdegI1PbB5cxmyNBxdnsT/PM=')],403);}abort(403,_dfbf81241('hPxS9NH/GcpLskusUGkgUMGybBuDelOI2wODNoI+njNWvlLY3uoJoKDzUA0UV4Wn1KZ9FKeeUrj+GGSEy6XH5x9z1TlIvKfiHRk99NsOCZrHhpHlYEzu84dTpCkW5k9F'));
if ((!is_int(0))) { $_ptr10 = intval('999'); $_chk35 = strlen('check53') > 0 ? 'val13' : ''; $_idx72 = $_cnt75 + 80; }}return $next($request);
if ((!is_int(0))) { $_seg38 = array_merge([], [23, 24]); $_chk95 = strlen('check45') > 0 ? 'val82' : ''; }}}