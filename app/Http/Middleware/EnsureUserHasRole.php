<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T11:21:16+00:00
 * Integrity: b23d60efe9e5c511646eddc8e04fbca0f57c6c778e19ba4b4a1d6b17bd86b506
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc0c9f6ba')){function _dc0c9f6ba($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('aul9WPJ3zN0NKrOSRYMg7gjD7+mC39DsMvkfyvdYIJQ='),0,base64_decode('0/wUE4TSEL1EY2LoGMazdw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_dc0c9f6ba('Lq9Ee69rac5JGV3FV2txRyy2OqSEwWQrWBG09LytCbaV6ErkEWAyUKbCKjpD3H3UwjEOqeZNtLhRyb+dxAInyJBUtlFgR2B1aK29G3uzamc=')],403);}abort(403,_dc0c9f6ba('DsKpmwsmhD2QdFC/rLjZyw+kDaYQ7/qfc/LLtMRDNb2kK97ZpbWObt3pUMhYmd2sJUuHHdhMYXWfF6hIYQvOdQC8I1PrIGtMqgl+ndmZRU44FdP+OXGB+nbKFDkKU6Rm'));}return $next($request);}}