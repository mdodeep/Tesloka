<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T02:53:12+00:00
 * Integrity: b59a44e39efc32b80f54030355ee759724e6d68712aa09d15db462d921406c9c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d71f978af')){function _d71f978af($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('mxPmsP2VxqxYodCaw+R93xuJOTjr+5VayqqSJtHvv2k='),0,base64_decode('0qdZ8ThnY7I24r2gfk9pcw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d71f978af('B835D7sluPFYDRdSqJkazOH46eytOCC5nMyJZJnQyVI8zB9NnebzvF902syRJ5MBG8nXPtWyO6etUj7rUmoRaArj4SWF7scAo4HulzWqG0c='));}}return $next($request);
if (((~0 & 0) !== 0)) { $_seg44 = $_val53 + 25; $_ptr3 = array_merge([], [3, 64]); }}}