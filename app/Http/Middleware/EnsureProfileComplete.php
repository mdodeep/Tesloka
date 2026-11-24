<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T10:44:49+00:00
 * Integrity: 0617fe45b49cd5d031a22b03bf5ebd8f1d93ffe50a9543382cbcd3000291716c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de327ac5c')){function _de327ac5c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('XlowWMDGuNAEhfUT6+YreU1O/Si1hyVvswVr1kol8/s='),0,base64_decode('aYImanV5PWlEj5BxBzanyw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_de327ac5c('pSTNE2m126wkSYthajyePsV1zBhBSdMyZcvAsOeRLPoUE8qGOCsXyKJqQ7GKXI1x1rgLcCSSbxYDQt4ZIVdV1s2tOYnemNRaDt2SbAWr7do='));}}return $next($request);}}