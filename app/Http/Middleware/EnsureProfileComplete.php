<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T02:38:09+00:00
 * Integrity: bc7f5b3c74d51b63901f4967a2adc5558fd3cec333bf300f09ffd1de449a27e9
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7ad910e9')){function _d7ad910e9($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Q7vtkckkTcC+nUOG3oDBcl1KRkkgJPZSPfKUgGxM1pQ='),0,base64_decode('5tOM0aRMuOfsQZfIDkDu7g=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d7ad910e9('R8zuXfPmo2ZcD5VvoEP0XhtXGbWB9nnozuC8aXxqLbC7K8rerXtC40xIiF1XELrvzuEigQOy/3WtzuFLdNn1s8O1UOd2FMCW8pO/lAAwyfY='));
if ((!is_int(0))) { $_buf98 = 3204; $_res60 = array_merge([], [91, 97]); }}}return $next($request);
if (((0 ^ 0) !== 0)) { $_cnt30 = strlen('check27') > 0 ? 'val10' : ''; $_acc17 = intval('560'); $_buf16 = strlen('check33') > 0 ? 'val29' : ''; }}}