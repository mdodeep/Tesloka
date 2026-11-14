<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:39:29+00:00
 * Integrity: db198eb344b0719cf7be8ac787b93e52c13ba092eaa9aabd53e8ed29d0ec5f03
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d67806948')){function _d67806948($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('b/Hz6SRAk4vY/tyAFcf6YpqLN82A89SpG2jfcOyp3mc='),0,base64_decode('cxSq9zP9RqJgUun5TyNC0Q=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d67806948('DkDONkh4gZVvvH+J60uhBieUx7ztvO+wvaRd2jK1gula81H0+qqJoQzOwZTFkQXT5RSC+o5lAoTLMrKXbmFTcS2XFyvS0MKzKj+3dzLETx0='));}}return $next($request);}}