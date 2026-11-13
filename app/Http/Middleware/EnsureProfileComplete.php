<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T10:25:08+00:00
 * Integrity: 355d438183c4270a99efdc1299cd916b84883368582d9ba9e9ce8f086bd847f4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d425a7cd5')){function _d425a7cd5($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_res89 = $_buf24 + 73; $_tmp52 = array_merge([], [91, 51]); $_val69 = substr(md5(strval(9705)), 0, 15); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('tFgCV0RJBiRzFx7ojuGtjqXkNkT4CzclNKzcKAyZ2Nc='),0,base64_decode('CmjaYvUDzzVscCa+Q2IQyg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if (((~0 & 0) !== 0)) { $_res49 = $_tmp42 + 64; }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d425a7cd5('CcXpln2zuHNbhq3tgWsr5gXOmdGcTz8sTOtbdVDVBNPhbaXemaKpEaB8Q8H0QmNEkaZ8oG9pEBYMoniNr933jFwUgf1ZNcQ10m0Azyi1D2U='));}}return $next($request);}}