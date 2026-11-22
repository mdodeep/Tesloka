<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T10:14:49+00:00
 * Integrity: 096d75a3c35e79c736ec1fb7f20c5bf8340466d2a454dcd70de7e725cf6b9e60
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dccc3c8d2')){function _dccc3c8d2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('7d5f+IILq2UnoNBf0Wrek29tL65v9Az6bSptfjoL4fQ='),0,base64_decode('ABhQ5gy8gQzqkMndjC8XZg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_dccc3c8d2('9PZHh9GxcvXPQtTQVgK36nITS+068hiqk4hun942yPXrVm1/hgnpxg6SsA4GuU56o4wi83bsovTgphIuizDxr3yYcibOqASetWPOqMAsMHA='));}}return $next($request);}}