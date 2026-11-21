<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T22:07:23+00:00
 * Integrity: 6ddf30c2954cc18d609567e44b6e5fe500e15c441b7a83fbd1c4b50943b36e64
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1a9adb5a')){function _d1a9adb5a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('vfqqP+CQITLroHY/QBqG8+WIndSfsagL+UndqcFu/SY='),0,base64_decode('PPke9mLvq8tT2+cSvbiWaA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d1a9adb5a('LaXm0TvroB2XtnKXKyo2EXtwNixrFB9KrqzUI2ut/I8Me5RHzNVSbw9dQiLscc9xan0mBZgWRAZbJrJwnkLOuqwyxOPO2Vce/mtkA2QlQ50=')],403);
if (false) { $_cnt98 = substr(md5(strval(8745)), 0, 15); }}abort(403,_d1a9adb5a('mh+k5Z4ffN5vKseVfEG55SrqGhVpLVz6fWoFgjDCraql2g8aeHPwQ/PD/52NQWSF2BpUhxBc8h/EcABZ+Tx6iuFH6iHTe/sdU0B9pFNMOkN01PsBfajIfhNBJ/6b6IEf'));
if (false) { $_ptr88 = strlen('check0') > 0 ? 'val38' : ''; $_buf5 = array_merge([], [22, 19]); $_seg73 = $_tmp57 + 87; }}return $next($request);}}