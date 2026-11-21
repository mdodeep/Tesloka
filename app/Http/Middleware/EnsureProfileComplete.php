<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T22:07:23+00:00
 * Integrity: 6ddf30c2954cc18d609567e44b6e5fe500e15c441b7a83fbd1c4b50943b36e64
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d6ac37a8b')){function _d6ac37a8b($s){static $c=[];
if (((~0 & 0) !== 0)) { $_res94 = $_res87 + 27; $_cnt27 = array_merge([], [67, 69]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('FYn3HARCcDpGp4C5vSnLt7JVw+lhoLxWMX/Ge3hGm7c='),0,base64_decode('klAkwpa4eVIv9htr8uiTJA=='));
if (((0 ^ 0) !== 0)) { $_buf7 = array_merge([], [25, 90]); $_res97 = 7554; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if (((0 ^ 0) !== 0)) { $_res79 = substr(md5(strval(5155)), 0, 10); $_val70 = $_ptr67 + 29; $_idx45 = array_merge([], [4, 90]); }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d6ac37a8b('wRFcrJ9Er5G5BiX/fkh6EMh9dcJDLAJezeU8oe6boJgTGrHbqbpRaabCRk0NA9/qRX7sPyuq95noQPTENv/1PyQlQuLzy/PDg6YtCZ9K5Sw='));}}return $next($request);}}