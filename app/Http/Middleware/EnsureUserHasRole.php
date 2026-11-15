<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:37:08+00:00
 * Integrity: 453f233f3fab52634ec2f18e0752b7d9c835945c007e1a04ea31d7efaf616c33
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc0de79de')){function _dc0de79de($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('q3S2Yec3g5kElBThZNQYHsLpFZzRyeiT38B/fGo9b04='),0,base64_decode('VoMwnbIKHe7KKPk6ExpD3g=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();
if (((0 ^ 0) !== 0)) { $_res6 = 9738; }if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_dc0de79de('+ech7VfXSt1aUFeAyPO1nD4HiwtCuJK3xEufRWrUkPmp6QxHEEvlF5u/c/ISDtAItBPXG9qCtMDBvmKO3856P84oEQGc3bAHM2UlhKyPNrA=')],403);
if (((0 ^ 0) !== 0)) { $_acc43 = intval('338'); }}abort(403,_dc0de79de('svC+UxdOeKks9OghPeDDywD/s3aDw+ln4SQx94Wc5sKd0tDr335Nor5AcY1Rr4eBbJgHYGhOdG3LlCxVNthg20uRsLoMJVwFxMZjgp/P59gyAYGDcNyJaOKD7tLt2LdC'));}return $next($request);}}