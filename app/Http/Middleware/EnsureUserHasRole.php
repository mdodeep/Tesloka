<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:21:26+00:00
 * Integrity: 8f90fb12585ba5433e80e954547474262d9a60cce968d861279d136af920b5bb
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de430c2a9')){function _de430c2a9($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('RaueZ8tFORbt3q7CfsEEwJgXlt9kB3JP1A8c1howsdA='),0,base64_decode('V1w5hSNqID7OOD4EY35IaQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_de430c2a9('Um3PC1PtrnZyxJFhgFOBqan1ASFMsrCATz2pr9pPvofcX9I5TmYsx2FxtZu+piJ6XBfsYgXKz1yjv/4inTFiu9jH8WrS9dDqXHAUA2xfR1M=')],403);}abort(403,_de430c2a9('KLovn4zECpJbFDPjn0Kt6d5cD9KIxXuVUwKeZqvM0UGAhK36psMgqBd3TCl9duq4xsH5ClgOJ/G10BKKhBHwFw4dOpSI7BbPCFCoTVqXs8PxokzBf55yGa0rpnvJgMne'));}return $next($request);}}