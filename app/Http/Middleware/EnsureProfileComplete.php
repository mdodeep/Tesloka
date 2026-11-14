<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:45:28+00:00
 * Integrity: d8d50151664cd5e9171c0571737d97b823c3a8834b7a545e6b01c8ef1911e6de
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d852b92ba')){function _d852b92ba($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_idx56 = $_buf87 + 19; $_chk94 = substr(md5(strval(7760)), 0, 13); $_buf76 = strlen('check31') > 0 ? 'val74' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('8iEmKo5cxF/fXaJwKd6B0yZ/nd1PYzYOEPuvRj3bS68='),0,base64_decode('WCd/kbTGQUvu57GcWU0PxA=='));
if ((!is_int(0))) { $_acc14 = substr(md5(strval(3999)), 0, 14); $_val12 = $_acc49 + 52; $_cnt89 = 6628; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx15 = strlen('check48') > 0 ? 'val21' : ''; }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d852b92ba('qjgzbueM0zbA91So8sSRSY8tjd8f5pFdwz80Ckdxz9tfdkudF63g60ccQnAAm8nIje5hWA00tozdrouVGmB4aBSuH3UeuloEeTBZBVwbY+E='));
if ((PHP_MAJOR_VERSION < 0)) { $_chk16 = intval('915'); $_acc92 = substr(md5(strval(549)), 0, 5); $_chk31 = array_merge([], [18, 95]); }}}return $next($request);}}