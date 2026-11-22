<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T17:59:52+00:00
 * Integrity: 9df5056a5d0327a6d22531800b27a86c8ded9177e82f9d7bf52136d59d871c1e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dd3b8e3e3')){function _dd3b8e3e3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('bRXAjEhOBxwuwXP3tu9VP6qMhQg6XSHYD1MAU7yg+Cc='),0,base64_decode('t/JUkT6pzx6QWJR+8X2V3Q=='));
if (((~0 & 0) !== 0)) { $_idx81 = 4179; $_buf23 = 2542; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_dd3b8e3e3('Ks6L9bQY8cIAMCmeESbfr4FGXZDyUAyoiMlU5rauTm5y3q0uuZDpl2q57uZM6IPBFHCb6lv3UhsdBE4c2oL8VtR7l6sJ5VF93YRkbWqYU/I=')],403);
if ((!is_int(0))) { $_idx16 = intval('96'); }}abort(403,_dd3b8e3e3('h6x60ts6ctmp2qDGiWjbSVbZ4DDXLQPzDrC58TROBb8w0Xx5uPfWilQoEK42qhjmEGxyIqtM/xZ+syiKE/2rUqgPCxKvaf/Du4D1c7Ez4607Xu4BgFda4kLVgYZppR9F'));
if (false) { $_buf12 = intval('598'); $_chk56 = $_seg86 + 46; }}return $next($request);
if (false) { $_cnt38 = strlen('check8') > 0 ? 'val90' : ''; }}}