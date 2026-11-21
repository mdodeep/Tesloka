<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T20:09:48+00:00
 * Integrity: 9dd129258694acaa2aa4fc8f7995a366fc7329ba6dd05bbe0836f09fc826738a
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc6c64235')){function _dc6c64235($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Z1c05GpCajeBKvIRIW11V2C1Nud/fXPbezj4DNehE9A='),0,base64_decode('ExCpiSJqz33Y479wKmdMPg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if (((0 ^ 0) !== 0)) { $_chk39 = array_merge([], [18, 38]); $_chk26 = array_merge([], [39, 61]); $_val25 = 7221; }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_dc6c64235('3gKRVbGIFYn5AuruZ6meNnRrvlkJXY2d5XVL1VMnD4p/y33P1DMLFdtDSArgDYPDCbOwEldEw2j3S9yVtAcCkGz2qk8b6tY8bwfbHaZWPHA='));}}return $next($request);
if ((!is_int(0))) { $_acc93 = substr(md5(strval(4374)), 0, 15); $_cnt18 = 9044; $_chk44 = $_chk85 + 12; }}}