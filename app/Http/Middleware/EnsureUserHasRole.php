<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T02:53:12+00:00
 * Integrity: b59a44e39efc32b80f54030355ee759724e6d68712aa09d15db462d921406c9c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d374449d4')){function _d374449d4($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_cnt6 = 9612; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('OaI+fD3CcL/tZ1pil4v8gQNi3bBFqXYudbnJkU64LLw='),0,base64_decode('DrWhTM5WubwQSPzRNa5gzw=='));
if (((0 ^ 0) !== 0)) { $_res47 = array_merge([], [55, 92]); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d374449d4('mwdHrqnWyXQkGzmh7epM4q+2ei0yF1AEiMqznjTaz4UK/hC0vXHJhLM7AXKIQOLUOfit2H8sH+opNHC8DbeS94rCv0ZbdutDGHEGqZN2E2A=')],403);}abort(403,_d374449d4('TfYEjSVyZumHibwcnONXmG+WDKaQskT2394o15j6S8eKhNl5gMKCPOPch78pmMSZqI0wwWk6gfx69dYqWwuHnfODqBaEdlDgORIk9rLuY44ccPE1DjKy9CMuvwdf8GCD'));}return $next($request);}}