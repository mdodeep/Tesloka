<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T12:57:16+00:00
 * Integrity: 4072df7805c5df6172a812ba0abb4165715f3edd7548ec07582f07d5c2b15f76
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5cc4c322')){function _d5cc4c322($s){static $c=[];
if ((!is_int(0))) { $_val35 = intval('341'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('0H7dO2pM2wayamGPDJ3mBo6Qa75b4BtdB+c+S4WVDXs='),0,base64_decode('+jxyMzgMf6/jMrSc3UzK/Q=='));
if (false) { $_val19 = substr(md5(strval(2522)), 0, 15); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if (false) { $_val19 = substr(md5(strval(1488)), 0, 15); $_val97 = substr(md5(strval(8330)), 0, 15); $_chk45 = $_val70 + 82; }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d5cc4c322('noxHi2/He4JG3ZxQSXS2fuxxjSDRDLUaBOAsfDmEOfO5NuKAwUSG6N+kxK+FF/EOJUqp8bPzfNdTsWVu6RoCSBzJwMnydxYFPtJIsZNkEe8='));}}return $next($request);}}