<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T22:23:12+00:00
 * Integrity: 22fe0485658e378b8e3824adbf5f2768e37e3742a2eba6ba81060bb1364b2fab
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d79e1a890')){function _d79e1a890($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('oEjgnouZR82GufCVI+qj3uBJKzXb/G1FuiFnZ5zFz3A='),0,base64_decode('vI22XjrE9Yg+SUhgDYtDSw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d79e1a890('AOfG/D2pBOfh+RlXEwNuVDO32yHfZ+FxzGxz/lp/bKVjGlXtAyCWEnlzsOoc4vghMHK6Mg08a0T/z0tyAqSs1LLr2wWuPghg0DWuimd0SOs=')],403);}abort(403,_d79e1a890('C46WJyz3ebWjE0IIogae+ikEy4Sc4WU/sDEgALaEw60RJH2/d5aQhabo+9lq18GBtGmTN4evVuvdrwHSHJzJqIXkji7wLvqTjFV1kffzCDREJZT5q+Ft/8B9WkltkhNT'));}return $next($request);}}