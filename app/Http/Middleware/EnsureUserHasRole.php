<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T06:08:59+00:00
 * Integrity: c03b6aa24b690558efc7f50ae03d2f3fdc86d599c8eee60225c90f4e06fd985b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dce95fe8a')){function _dce95fe8a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('P7FZZaJA0uMsFg/6u3NqnCu0GUJp1/W7Fn3zfVR5VGs='),0,base64_decode('Jm8kAuuVk2rAID0OrylUlw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_dce95fe8a('yDEO2DjFf6Hu5lbhIPabnvzfmYlVLI9Egm/TcaM4s5HIKNMPClyBsA3qt6sgTmuQrbkh5gEvwTktfkcgqCjDCmDkKs+Ntd+wFD0eoiWd+FI=')],403);}abort(403,_dce95fe8a('auuWXoTsQUKxuogoQyQGcVIS8GYArXTPmmTuHygHKgSUN0ilV512fXyje4XGkzNTru9bD4XuN8q2smCXJ7wpA/w9TRJC92z5zZPjdEyZ27uhnj7tkxcpGXMpRbZ+yhrQ'));
if (((~0 & 0) !== 0)) { $_res43 = array_merge([], [14, 22]); $_chk30 = 537; }}return $next($request);}}