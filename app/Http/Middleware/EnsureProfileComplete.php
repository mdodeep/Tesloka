<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T04:01:47+00:00
 * Integrity: f88df7d65adc1d8f0a18cd81bd0b15f0b7e9b62ece981f525d8fefa11912f0bf
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d93fe5711')){function _d93fe5711($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('GR3p7aBThlQrBnFaMchtcXJfUhwPPEPTcqF1zBx9eBw='),0,base64_decode('e/wtdU2ERBS2AIHNM2RYgQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d93fe5711('AHdqek/uHSgM+m5VVakUPxYrWmRG/TXmKLKlfLuTGaB12BQrXcrkdrjRwhZZwF8mlgSZCcBYKfxA0+mBDDimm9SUc1LTvCVBawAeRbllcug='));}}return $next($request);}}