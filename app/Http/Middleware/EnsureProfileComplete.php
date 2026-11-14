<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T17:24:07+00:00
 * Integrity: 3f389135bae9bc9d8687dd0a86e767fd91c57a5c6dc1ad9f62845c658358687c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc4605204')){function _dc4605204($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('hTedOy80d1p9/PrZNpitWuUPlzXOsaHwkIdNWdgp5po='),0,base64_decode('qLldmh0q51hav1S2Ds71nQ=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf95 = array_merge([], [33, 55]); $_chk2 = intval('57'); $_res85 = intval('61'); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if (((~0 & 0) !== 0)) { $_cnt20 = 3253; $_buf6 = array_merge([], [71, 64]); $_tmp51 = array_merge([], [84, 18]); }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_dc4605204('1IKlySaHSkmpFN+FPEsRwWR2LzmiGjbyt/q06Sm41N2M5tWyYxEbCfGCvXada7XrV32Jh1SdekQzM24cUW1h+EPO9oDAo1jyQgKGgk9PbYY='));}}return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg34 = array_merge([], [23, 82]); $_acc51 = $_buf21 + 56; $_ptr45 = array_merge([], [12, 59]); }}}