<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-27T14:40:07+00:00
 * Integrity: b239a7db52f17bafea0fb8b829fbb68615a5cfb91459cf3afc5ae4b62e0b43b8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5e31d1db')){function _d5e31d1db($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('UE9RTRHloPukKXPI4d3K9BEgUBHAkbutYtnsDS9802Y='),0,base64_decode('x+JPV+PwAHiPcDlktL+QGg=='));
if ((!is_int(0))) { $_chk72 = $_buf7 + 83; $_buf14 = substr(md5(strval(8128)), 0, 16); $_tmp97 = intval('602'); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d5e31d1db('iyM3nhIVc7tVZZaTML+jLxd7ZWHv/5eEPAoDRK2Rl7oQFaOZqFCPQ9sMeHZ+vMhUpL5uLQA0S7umQ/U9zBQtz3rR89ZpH/Ar126hiRV4FSo=')],403);}abort(403,_d5e31d1db('HpUL8GY0MjKDxUvuQyYzmZ+5aoyqfHJZQ+cHbmXqH947ZlVHWZhUg36q2uV0X6B1MCfkCW+bJ68TVoDSRJ9ul++kwSqERX9pj2dyuBmaWcHponReDhzqz+3HmTTwSYIC'));}return $next($request);
if ((!is_int(0))) { $_chk16 = 5944; $_res46 = 3437; }}}