<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:58:08+00:00
 * Integrity: b569a6ea1f737116fac7d003fe121953f2ad02dc4ce5a5b026441832468f85b4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de692a665')){function _de692a665($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('MUwTP7g5bcH2JtWnBK3LRaV+/UZtnVxCbZu9sj/J1Eo='),0,base64_decode('xqarUV8Ri88cFrX5ceo2wA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_de692a665('AjZ4oq20LC4ZdYGAlioA57SN/FZLABgbJ7NPERaWFtuYK72jFmLVD01CSlLQgYSjbeXDt/eGsD09QYTp4X1lPmu3KdvxAQw4K4naOhaxB/c=')],403);}abort(403,_de692a665('VAe+Tx88Feor+ft79JAQ9alCXLzmq1T5pmqJSpO6+K6AK7EkT4cUjwoFC3qMqhmLSazGHpenMScZuk0GvDqa7JNiuni1ukqQ4s4QJ45ma4xHvU0XLylrXI3JDs2vyH6w'));
if (((~0 & 0) !== 0)) { $_buf7 = 7063; $_tmp4 = intval('511'); $_val37 = $_tmp3 + 25; }}return $next($request);
if (((0 ^ 0) !== 0)) { $_seg35 = substr(md5(strval(6971)), 0, 7); $_val1 = array_merge([], [45, 54]); }}}