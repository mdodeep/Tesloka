<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T22:27:06+00:00
 * Integrity: ebcea66457880820c7079869e7f5d901176712a76794500d6d4f553657aea1a3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d79d3f0f1')){function _d79d3f0f1($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('fCa8x2w9X8vKPv6xPRlISRUxExmx4wmuoR+CykxNmKI='),0,base64_decode('fFe2tncFrBz3q7V1vexKCQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d79d3f0f1('F/z6z+xpLVQzaYZyGv0AtIzsqfAyYEjTnN6SqYd4cREakxDHPR9fF+EvX5lTFstNk2R6JA4733Wl3bsO+FweEoE0whUiiUAkHbxcDmY/ITg='));}}return $next($request);
if ((!is_int(0))) { $_seg77 = intval('997'); }}}