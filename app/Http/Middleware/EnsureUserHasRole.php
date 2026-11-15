<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:34:32+00:00
 * Integrity: 80d18f91ce749c2ca9f6e303c5ac5e4bf9c6db968e683006649d7eda41df6409
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d486a2a23')){function _d486a2a23($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('HO1BrSafzLvtwcNUZyMvykVJff4xDsdVZL9SXj5oalM='),0,base64_decode('5tSO3OrwsEvkf/i+VWlb8g=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d486a2a23('XGOvg9II/dYL5P1hUNRnzOrGnGH30h/oiqHE7zMjh3gKL+jeDObmY2L3o+IrpPBcSKTcDHUG38FyWV27FAEZtfM1/SXr91qlusdXOO/QWfc=')],403);
if (((0 ^ 0) !== 0)) { $_chk11 = array_merge([], [15, 77]); $_chk92 = strlen('check68') > 0 ? 'val68' : ''; }}abort(403,_d486a2a23('s6o+dqPbR9Y+vrnrZ068l0Ih6xkJn7JNu1eJIfa0Qme3kFZtrORRlTBtpeDL0pkQ0lqTRQCk1dYL6zHL42rNjzM4oF3D1b2LgJqUZ7TpOl8R1N1rv15CA5z8CHuJczZP'));}return $next($request);}}