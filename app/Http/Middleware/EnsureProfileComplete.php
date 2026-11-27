<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-27T14:58:43+00:00
 * Integrity: 3dc1d2953336640e852424b26616dc079ca30419693ee27f8cb34c60b2f6da17
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d0fbe5114')){function _d0fbe5114($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('LxYwUac6Rwxsioc9XPMD+PnQVDIxE5alyNMm52Qmxgs='),0,base64_decode('NaA6DP9CleY/IMLJhaw5HA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf19 = intval('440'); }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d0fbe5114('DdH77hTiVXO5vRL4BpnimcwwKNr98Yh5lRa8U/ifHbxsKZdKrqIV5b9j6OxJUXRtT/Qbl0b9mBOMWG/MbWGNA/QEr2AGTJ66tXJDn/YnrcA='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_val83 = strlen('check93') > 0 ? 'val66' : ''; }}}return $next($request);}}