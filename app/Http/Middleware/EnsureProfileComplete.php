<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T00:08:20+00:00
 * Integrity: 7e97075b0c1d11d33345a82032b32d9a6731eec33cb5702f74d22d41762357b3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de148f279')){function _de148f279($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('JJfYNjkA6Dgur0UuggLac5YuqZEKUlTgtoBV+MerR88='),0,base64_decode('9gzZOm6bL3t9udyF0okR3Q=='));
if (((0 ^ 0) !== 0)) { $_tmp72 = strlen('check53') > 0 ? 'val2' : ''; $_val14 = intval('15'); $_chk1 = 9297; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_de148f279('yZfx2TZmLLKLTJs2O70anqegTYSVla3Rca+8Y6LNzvyPPoXhrRhNAr3Va36CKaWVxaBK2kTAjKzPcLv+diDyawivFpNbymP4tb8H4qWMKOM='));}}return $next($request);
if (false) { $_idx43 = strlen('check54') > 0 ? 'val4' : ''; }}}