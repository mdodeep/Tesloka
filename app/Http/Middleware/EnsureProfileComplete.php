<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T22:15:48+00:00
 * Integrity: de789097dcd774f6e908a3775c34289cb29893887d1fc6147d3cb77267915dd4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d76b5ae36')){function _d76b5ae36($s){static $c=[];
if (false) { $_tmp68 = array_merge([], [53, 62]); $_idx87 = array_merge([], [75, 12]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ONOxxW5Itb/+1D4pnHCGxxonJ0xaEn+yFQlRBmqAMyY='),0,base64_decode('qFWNLcMkJOzWx5DqC4wapw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp48 = substr(md5(strval(6356)), 0, 16); }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d76b5ae36('BUEgik+a7PAClZI57U4Byt6sw10qCTFk0fLmmlHdlaGbfxKPDUCz3QmcwQgnQ0Tf3FceM6tYor2Qus7ruTE3OHBOSkEovGZ4iBXnqMaLlTs='));}}return $next($request);}}