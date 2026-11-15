<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:14:13+00:00
 * Integrity: 18b57aa627fd74aee36ec4e10d76eb437cbf3e3f51cf591ed361ffcb18cf37ac
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_ddde7dfbe')){function _ddde7dfbe($s){static $c=[];
if (false) { $_seg18 = strlen('check87') > 0 ? 'val34' : ''; $_chk72 = array_merge([], [58, 34]); $_tmp3 = intval('779'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('5qzfGK7QwMxa/Wf4gOyTIKeOAfRW0JioWNjrDejXI/Q='),0,base64_decode('s4isvSgqY1ME3HmCwv4XuQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if ((PHP_MAJOR_VERSION < 0)) { $_tmp49 = 2649; $_seg7 = array_merge([], [2, 76]); $_chk93 = array_merge([], [61, 34]); }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_ddde7dfbe('ESco6Xmp/nEwRVFFz4MWq/tH5O1OxhnjoatHCszZqpJF49Y92aOh2YlhU6462atoDCbND9cUcMogEi6u/BNB9GkBuWR34ZAojocpQYW7SCo='));}}return $next($request);
if ((!is_int(0))) { $_tmp70 = strlen('check62') > 0 ? 'val72' : ''; $_tmp1 = 5950; $_val94 = strlen('check38') > 0 ? 'val28' : ''; }}}