<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T16:03:53+00:00
 * Integrity: 72d6c2a8f55830d6dde7c4fc6854949f9ed50a91f2785841c39a708f3a0fa05c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1c9b7f80')){function _d1c9b7f80($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_ptr54 = intval('549'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('O4wRTFxp23mwW2NqqUeCrHTHwuV2UmZGJZ0ato8lAKM='),0,base64_decode('YtbphV9lWDAOJnoAbs6fcQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if (((~0 & 0) !== 0)) { $_chk2 = $_cnt86 + 82; }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if ((!is_int(0))) { $_seg13 = strlen('check10') > 0 ? 'val94' : ''; }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d1c9b7f80('2snw0hrTT1byNnfzEr0mFWRlEmNJPFTjZBsXHlyVtcV2wVUPthzK/tP9oufIP45XglgLgNMFbkVDAHcI6U2tk06UrltJqpfITLijRNiIMBg='));}}return $next($request);}}