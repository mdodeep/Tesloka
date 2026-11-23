<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T03:17:55+00:00
 * Integrity: bdeaf86c3382669bdfea6ebf51d5418a6e22948d723c091cf74131355cf40149
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1a346201')){function _d1a346201($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_buf75 = 859; $_tmp38 = substr(md5(strval(314)), 0, 6); $_idx46 = 3735; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ff2WsB0qYm8EhEjeAya3PH6axx19fpQkCh6sg++v8hY='),0,base64_decode('3LnRgZTzs6S5qG1znIGhGw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d1a346201('swwM2miGdJF+x/QFeZ1S6BCw4rEAH7ROam3fxtK8/4BjQFE0uZsJmU68+m4V0r+xUU/3QzDk83kZSyrb/01nXZVOR37RF43EZ6kyIONFOU8='));}}return $next($request);}}