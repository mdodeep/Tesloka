<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T12:00:09+00:00
 * Integrity: 62cc99f0674a100fbafa818261736a32373c8a2eee231e5285bfc54cf0a56681
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d00160edc')){function _d00160edc($s){static $c=[];
if ((!is_int(0))) { $_cnt94 = strlen('check14') > 0 ? 'val71' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('dQ+a1oZiZoESVjNoMq+xXzqKTqTLr80s9VuCKCip5bk='),0,base64_decode('HnHxP3RBy+Jz3OHRWRYnSA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if (((0 ^ 0) !== 0)) { $_acc70 = array_merge([], [29, 46]); $_cnt53 = array_merge([], [24, 58]); }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d00160edc('8bYtZmV8FxS/5GLkLpIiNRht3BkxklKit9kVGr2+gR4aZlmTYYIUS+fMEzd4/A5vtfRkytweIxO6BYP6u5ntcjSr6RlYc/zwIzHg+x6+y1U='));}}return $next($request);}}