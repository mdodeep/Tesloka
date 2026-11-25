<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T00:24:14+00:00
 * Integrity: 5da5c6cca66823dfedddb1121822d4c09c3848265e65b0832f452de0e4642672
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9e33e6f3')){function _d9e33e6f3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('d8yz2CU4fW7xTaIMOm2J0yg4qfGdcdEl73G+BMhrJLQ='),0,base64_decode('b97WHnezdmvZMnEEnjADDw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf13 = intval('920'); }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d9e33e6f3('dpQn1DXixBNsj43DRKobmrwlCPTptbEkAHOo6rBCYC+nQQFtblBw10gw7Pmuol8V2DCmAkcccJbTayEj6xBSu8UzVEbUNHrsU5Gyx5lWCKw='));}}return $next($request);}}