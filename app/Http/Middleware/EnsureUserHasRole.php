<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T22:27:06+00:00
 * Integrity: ebcea66457880820c7079869e7f5d901176712a76794500d6d4f553657aea1a3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc32b869c')){function _dc32b869c($s){static $c=[];
if (false) { $_res38 = 7796; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('VgNPRrh81KXgnWNmim/fBbyPUifMxJhTT95QPp3Q7YM='),0,base64_decode('jmjMoOuW5xoQQ0gEWR1tUw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_dc32b869c('3Y2UwtGou3HpD80BEt7oxiY4TaQvBJsztxZfh4wgS0EVNQqkGe/UrMN1qZOyertcRUAlDw/rxQPKUsg6siEZ1SFl2szBDji6j7PlyY0+Vjw=')],403);
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg76 = 3616; $_seg54 = array_merge([], [34, 92]); $_chk44 = strlen('check83') > 0 ? 'val27' : ''; }}abort(403,_dc32b869c('iCvm7d32ZKS9IT/twfT5MqtDcJXAcrigHk1WicJis36T8M1drvbwgLPMrBWk9kVV35EdHqURDwL8o0MfyQbLICncYgovuqCeF9rtqnbuLQiywVFT9wqABk8yziseQy5A'));}return $next($request);
if (((0 ^ 0) !== 0)) { $_cnt58 = $_seg35 + 32; $_seg81 = 5872; }}}