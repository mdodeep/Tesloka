<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T16:48:11+00:00
 * Integrity: ab8dcbec4f381a73c000a540f5da45639f9c8e40ebcc1ddbc948e203c6c604db
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5d22334d')){function _d5d22334d($s){static $c=[];
if ((!is_int(0))) { $_chk43 = intval('827'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Zx2NBbCr7WgALfcg4cHguJVQ8jgBxfP5+1OUVxm5LeE='),0,base64_decode('b2Z7OphkDUxNjGKNoGmidA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf31 = strlen('check98') > 0 ? 'val26' : ''; $_tmp13 = 154; $_tmp79 = intval('22'); }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d5d22334d('O86vZ5ZnzPm0+B1VRXmt+ZMLcLNjsvRF3KmorcUoJrsr+K1JL8UGLC8WVmKo0WuH2AyRrYYw2isEbabn1PjBay5Q4tTF0IB7DciCtHLEghw='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp3 = 2866; $_val46 = strlen('check80') > 0 ? 'val27' : ''; }}}return $next($request);
if (((~0 & 0) !== 0)) { $_chk51 = substr(md5(strval(4107)), 0, 15); $_seg71 = 8742; }}}