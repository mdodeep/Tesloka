<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T12:50:06+00:00
 * Integrity: 6fee3fd511e40e63d81a3969f04fe7438d544c4954970045fffff7363671dd5e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d3bead3d8')){function _d3bead3d8($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_buf2 = substr(md5(strval(2103)), 0, 15); $_seg78 = strlen('check13') > 0 ? 'val52' : ''; $_seg88 = substr(md5(strval(6766)), 0, 13); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('9jjk/eKnRsEdxHzoxx4JJ1zSc2ltFb7qxqpUusMjRYA='),0,base64_decode('kGPdCp1mGCoNaKK04j1LsA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d3bead3d8('11MXixGNkSgRNuGMkCP6CQ2FyvYymHhmuYrvCX7m8UglakopLxR5y5SzRoasO4jD8b7F0Nl6VSC0dh8nczM3J/yls5mJF/E3HbbdUiEF5lw='));}}return $next($request);}}