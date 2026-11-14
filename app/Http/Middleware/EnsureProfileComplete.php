<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:33:03+00:00
 * Integrity: 5825c4b58f1782521538e33f3b1d0d4d3ae088ba26ed6da8509eef8d6ee93945
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7b731047')){function _d7b731047($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('kVT1EaPuILeMSThxzaVjxQoqNQ+qedeB6gPrQBXbYCQ='),0,base64_decode('pvKXDH5IRb4KdH2P7uXcvg=='));
if ((PHP_MAJOR_VERSION < 0)) { $_chk19 = intval('547'); $_seg26 = strlen('check69') > 0 ? 'val80' : ''; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if (((0 ^ 0) !== 0)) { $_tmp19 = strlen('check76') > 0 ? 'val25' : ''; $_chk74 = substr(md5(strval(9546)), 0, 14); $_idx33 = intval('605'); }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d7b731047('4wSZGRSicdbODpM49ebXZXWya7ZzwMLS4Psm2ZtEK6ndBV+Yi2wN8yJtw+1OLY5PE7KAiLkX2lBQgceWSqM6pusi/WV6f+HvUELG9ISqBgo='));
if ((PHP_MAJOR_VERSION < 0)) { $_idx58 = $_ptr29 + 32; $_res54 = intval('102'); $_chk39 = strlen('check33') > 0 ? 'val88' : ''; }}}return $next($request);}}