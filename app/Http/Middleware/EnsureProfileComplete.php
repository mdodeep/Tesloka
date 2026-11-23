<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T23:08:28+00:00
 * Integrity: 5c94317afd2613abd4cac910af081de6044c3184fbb4b7b29ec81b4dba5e2cee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dd489658b')){function _dd489658b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('P74FqozPiE37k0Wk1Q9gyEoRMEUegWR6XU90m1zekzk='),0,base64_decode('f9ICm2RH9tsmPK7brsogUg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_dd489658b('GWgMOws6/qxrS5Cu9E2Ll6LGO25u73jfFz+hwRCpSXW61ocyD+p3SU3u45qt9myuZHzIR6E4RInCsOgjHbKPCHdn/GSgguSv5xfgO5K6Xzo='));}}return $next($request);}}