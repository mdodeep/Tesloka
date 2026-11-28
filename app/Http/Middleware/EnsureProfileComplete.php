<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:58:08+00:00
 * Integrity: b569a6ea1f737116fac7d003fe121953f2ad02dc4ce5a5b026441832468f85b4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d41d43225')){function _d41d43225($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('z2yi9CwnXfPA/alppCETdua1++FPqlMMqQvxze2c4eY='),0,base64_decode('z2HtO0O9FX+Wr1LgKPw4Pg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if ((PHP_MAJOR_VERSION < 0)) { $_tmp35 = substr(md5(strval(2326)), 0, 15); }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d41d43225('r+AfNMZ4j9+IIFLsELdBzmtx/rsW6v68OV1qRm3wCJq4m8JE9zCVMf+J71wwgb7zuCy3Bg/9wYMRR6cmT7vbx6ViS55e48i+DfVbIcayx54='));
if ((!is_int(0))) { $_val90 = strlen('check61') > 0 ? 'val19' : ''; $_chk11 = substr(md5(strval(3819)), 0, 12); }}}return $next($request);
if ((!is_int(0))) { $_chk92 = 951; $_chk72 = $_tmp88 + 42; }}}