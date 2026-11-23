<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T21:20:40+00:00
 * Integrity: af6d3acfb2e194b7af06fc05cdfb21508ed4daac2fc61ce37d8c71b27cfd6906
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7513ae10')){function _d7513ae10($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Wj/EskRKyt4FddBoiuYIkLH9b+7nGSQuM0SwepH0oH0='),0,base64_decode('DrLZ6hlxPMCHqwoazuhj8w=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d7513ae10('18b1tYcopdm19mlzskkJ7GMHsr4qKfUNYiYgvl8CnWLxX1dP+suFz0zAmrEIdwfWyat77DayxYKbe1+4AVO2jyJDPs6gpWpeoDH7X3Y9E+k='));}}return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp21 = array_merge([], [46, 13]); }}}