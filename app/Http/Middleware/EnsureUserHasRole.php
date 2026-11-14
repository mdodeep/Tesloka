<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:29:50+00:00
 * Integrity: 236dd0e3467bc4ce564f0c4033cbd8713f7abb388c86928344a1a6690f9242d6
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9c99aabe')){function _d9c99aabe($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_res91 = $_val61 + 4; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('L+dm1ffmI2qPscphRSoyki76EXQXhr6SwDY0chnkV70='),0,base64_decode('BEjZY3ZpuPBalopOA4qddQ=='));
if ((!is_int(0))) { $_val57 = strlen('check56') > 0 ? 'val97' : ''; $_buf30 = strlen('check95') > 0 ? 'val69' : ''; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d9c99aabe('YEQmgG8aDHhAcElCGqaFLt7pSrPUuM7uOOAq28nLB8ahuB8ZlYPEC9QR5+eKOn1/vJh6twZ+a4CwQKY3G2cO2iAy4jzhKCy/fTHxq8xRS0I=')],403);
if (((~0 & 0) !== 0)) { $_res76 = intval('172'); $_val45 = $_chk24 + 61; $_res88 = array_merge([], [6, 93]); }}abort(403,_d9c99aabe('KDbq9dN7+tT2BLysfs14XsU4UyrptwOgN6fFFkKYBJUw2UlZCk8WH1RY8VElSIypl/zy2bDGrmu51X8JmXMuxDytFkmnq9ZjIU9Zfxho73549DPogjZ9mgO1U2LrCLC3'));}return $next($request);
if (((~0 & 0) !== 0)) { $_res30 = intval('245'); $_res73 = substr(md5(strval(6867)), 0, 6); }}}