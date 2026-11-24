<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T14:53:14+00:00
 * Integrity: 179c6012d379ee653be11c384ab2747ffd20fdf270a218152104616ad00751a2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d52746648')){function _d52746648($s){static $c=[];
if (((~0 & 0) !== 0)) { $_seg66 = $_seg86 + 71; $_chk58 = substr(md5(strval(3478)), 0, 7); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('BUiUIJzoEdprBBttxV4sEbnPeurXaB5Vg/akTiN9g1s='),0,base64_decode('+NJSA05LVSFwjGZgY9JaXg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d52746648('5n5KnC1gYIdlf6rsEz6YfkgFeZBtnc0WOHDiDilCHUgWOWbb//vnJuwGeRF2FCctuWfFWk3zH5bgKGXZbFkbow04vQjZo8TgbCgRkSt/qC0='));}}return $next($request);
if (false) { $_buf71 = 4586; }}}