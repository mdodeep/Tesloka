<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T02:29:15+00:00
 * Integrity: bf398720bd9a3bd753e409fc55455db0d0d24680c20966a4ff9c3742bc0133a1
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dfa2d34a7')){function _dfa2d34a7($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('9QLreYcEm/a+quG/1UtF3GOSmoI9aiBIu0uTxxMKQQo='),0,base64_decode('rLz+lxQhwewsQEqEO+euyA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_dfa2d34a7('9BZP2/o6g0A6yhCQfvpYvVE3JC2J7a3Iucy38CLnDnV9GYQtBITRHuWXAXhiOJJLzRQRkWOWyVK9Z+NRae0lVGE8VtQHXXmzsxa3wbhIaUs=')],403);}abort(403,_dfa2d34a7('DhQAnTgwBv7OByD0XTskdBQbZcOdc8z3IlCRnXiNlbhbGHTv6CyvHf5xzozLUPq80kOcexDUIk47425Wdisry/Ft5MMsryDLu7GG0J4MCdqzrVdl218SSya/tfiXzFrC'));
if ((PHP_MAJOR_VERSION < 0)) { $_seg70 = intval('513'); }}return $next($request);}}