<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T15:37:40+00:00
 * Integrity: 6cab5f32f79b494a98da1bcfce2bcdb278ce6ee5bc6f7ac0c8dc7ba17c6d7508
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5d703025')){function _d5d703025($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('sG4aQYCvAxIhjb9OlCsyefv2JbZdflV/0psPeJTCPoE='),0,base64_decode('hcSlxvOTxvQsYQG7sUV6LA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf9 = $_seg66 + 4; $_tmp63 = intval('714'); }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if (((~0 & 0) !== 0)) { $_cnt28 = array_merge([], [38, 92]); $_buf99 = 6438; }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d5d703025('nOPjvkPDxC1VZ/ARus4YeWyLKV5xwh10vFOysTMnhGek+10QfCBpIcXk0r9ti8FqFoUOcIeYK+G0072uyzmbJR7tlxwn0K/vYMJ5LJz31ac='));
if ((!is_int(0))) { $_idx27 = 3049; $_ptr15 = 2298; }}}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt74 = strlen('check54') > 0 ? 'val67' : ''; $_cnt33 = 4886; }}}