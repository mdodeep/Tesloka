<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:46:06+00:00
 * Integrity: 69b98c86e8d708190ec7678d1b73bc2ecd4b70cd054ffeb1223678ae90de05f0
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d386f9541')){function _d386f9541($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Eo7vWdPr17pCvrqFxSLohVnI35N03lr7M0xSKZTeMTo='),0,base64_decode('zgF1k4z41BjfuweM4eYwng=='));
if (false) { $_tmp10 = $_idx23 + 45; $_ptr39 = strlen('check49') > 0 ? 'val10' : ''; $_chk54 = $_chk73 + 58; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d386f9541('fUbehd3tmmSLt2GRLJbvZQ7Y0909yxRccZi2O+PXtGVDjx8NV17it6+Bwr983tmN7kTkOH1anaLXlx9aOtXdnv0YJHGQjQR8oeG9P/UwFMc='));}}return $next($request);}}