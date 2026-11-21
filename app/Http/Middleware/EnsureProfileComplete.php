<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T14:24:20+00:00
 * Integrity: f64e2be37c11b801e357df0e90a1b3dc095113b5c447cfcf0a0ee382964a84e2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db5f701ea')){function _db5f701ea($s){static $c=[];
if ((!is_int(0))) { $_cnt62 = array_merge([], [17, 66]); $_idx10 = substr(md5(strval(3337)), 0, 14); $_tmp78 = substr(md5(strval(2672)), 0, 14); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('D3C7pIZXdSisYEW2X41Ule5TRmQ0ZmN4mPFF8d1eQRQ='),0,base64_decode('KF87qubhA8iwd+kKsvBTPQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_db5f701ea('SxLlL5stZ0fSGzq0zmczIU0/Oku3DyDmhVNndgtJxADMVAuLsYcCxL4yCqWx0g9GrWavOyQ1aQAkdNQl2YFQX/GKjUK5tgTk30IClxyh9Ho='));}}return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk75 = intval('197'); }}}