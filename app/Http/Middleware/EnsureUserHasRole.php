<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:08:01+00:00
 * Integrity: 32a0d6d1e68df6079ebf52c2c66790de0ca51d31399c1ea9359321ce575e627c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df895b7c1')){function _df895b7c1($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_seg34 = substr(md5(strval(5263)), 0, 10); $_idx86 = 3731; $_cnt18 = array_merge([], [19, 75]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('AYsI1APkJtPJJ8qfBU6Ooo277dI2L2bvTgkIw+/GSno='),0,base64_decode('xHvD5aB0VtbngWmVJWxZ9A=='));
if (((~0 & 0) !== 0)) { $_idx98 = substr(md5(strval(8033)), 0, 13); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_df895b7c1('B5gRDFQSYwswhJOKC/F6kRyViCCGP6FkYxAiETIgpu5Djdmzt4jpEjk6IUokSteHy2TvGo0fQ+/eVHjGpfg++N1TA79h8dmYw2jMC8O/v0k=')],403);
if (((0 ^ 0) !== 0)) { $_val54 = intval('690'); }}abort(403,_df895b7c1('zMMYMihNXebhWdJ8IrGIvbSRog31+cqIxZBJhNFONDiX1Vj7q1MagYlheqPYuqJhFh42m3US0XenDS8wefHP2FYwVLSFHU+hSB7NXZ0fiXOSPT4wyWuMbZqNLORWfjWc'));}return $next($request);}}