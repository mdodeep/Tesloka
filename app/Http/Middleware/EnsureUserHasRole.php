<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T10:14:49+00:00
 * Integrity: 096d75a3c35e79c736ec1fb7f20c5bf8340466d2a454dcd70de7e725cf6b9e60
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2fa2f6ff')){function _d2fa2f6ff($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('t2wvC0oR6qlF9Hr9z+F8UM7obKppolmiadC5Y55lBd8='),0,base64_decode('lclbm2Ci6q0Q9/kfnoFmkg=='));
if (((~0 & 0) !== 0)) { $_tmp6 = array_merge([], [86, 80]); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();
if (false) { $_buf17 = substr(md5(strval(681)), 0, 11); }if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d2fa2f6ff('strBZDLr0hVxuany+7MvZCAdBIjh/h7EDwkZSl4GQQ3kfqKyq5nfzepgoyy3gCbtxVFtRZRs5BLlPoMpoRab845SEaxJtdaz0iPzSQ6a25Q=')],403);
if (((~0 & 0) !== 0)) { $_ptr48 = substr(md5(strval(3832)), 0, 8); }}abort(403,_d2fa2f6ff('kxT/NK3CwWw9KjRg5qQd1lLBGmntCGXVFXoEZKKVWcngf1zPXbSfzD3G525sj2nFK2BLttF+ZPiym3nbCc3QxHwiMNcCUGC+x53BhK/yZGmlqC0FpWRKrxi8JwXTDBGf'));}return $next($request);
if (((~0 & 0) !== 0)) { $_idx14 = 7167; }}}