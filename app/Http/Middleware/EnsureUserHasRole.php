<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T05:03:51+00:00
 * Integrity: f5a75bcdc48148c8724fcb4a06b85088073bf6fdb5c9c28924b472633ae79374
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d05ee1209')){function _d05ee1209($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('wKPBCbjKw9/YBQJDbaoJXJCD+18kSPKBUYE4WIQ+M+M='),0,base64_decode('xYUuKJP30fSIbwyqKzHNfQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d05ee1209('GfV6w5RhvJnmKELwWt0tPUaSp1ciUYQNesekAiE15RvPjVUeG1LxYbMM9H2haN5p9VeQbl+4aOEwFuQY9U/PhPt7NLqfPnnWCmZS/i3dRes=')],403);}abort(403,_d05ee1209('LmSAfiZdqOfAreYHDB54JtsHTG56ZmVhn8mNFdq8EzRl2/iBQe3jmiEKP6xg4lCCxsqCRzZaWvlKwjlVkwaoAi0T6aP8yanBTzFPuDevJyuDk40DSA2ZWQsBaPz1QKfM'));}return $next($request);}}