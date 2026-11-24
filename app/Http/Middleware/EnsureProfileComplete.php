<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T17:19:42+00:00
 * Integrity: ce5546e3b06a0b51173f929af6400b66496593d860eae83b4b01ecf9fcf73e14
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d8ca68287')){function _d8ca68287($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp10 = 5796; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('kWofg+Vgsz1/FxAm8DFgu1tHpKriH0+UhxyX9lm6UlE='),0,base64_decode('nxFfk27uYNqpAMBVjq7f/A=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if (((0 ^ 0) !== 0)) { $_tmp87 = 2387; $_seg26 = strlen('check40') > 0 ? 'val38' : ''; $_buf92 = 1656; }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if (false) { $_acc54 = 8298; $_tmp71 = 6863; $_acc85 = array_merge([], [34, 59]); }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d8ca68287('AjdUnudonORkk5XZgv5pbgk0vR1hlMPmsutL3Pp8VQnqEp4W9lviPzj3Plva5Ic0QZ9GWZR3D9/Up5bn626nocq4T0qSslsVK8OD/2uP3Tw='));
if (false) { $_tmp80 = 92; }}}return $next($request);
if (((~0 & 0) !== 0)) { $_seg64 = 1311; $_ptr16 = strlen('check18') > 0 ? 'val27' : ''; $_acc79 = intval('443'); }}}