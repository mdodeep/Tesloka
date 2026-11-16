<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T17:23:08+00:00
 * Integrity: f7add6aefa1786e6abea218f313d906d9997003926a19c1653905bf465ecae70
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df3d9d478')){function _df3d9d478($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('c4fiAZIk/MKzr95x3ftbPmWLl8pJdbPM30srEEQt1OA='),0,base64_decode('J/8k0yDg1U8WbT6KKdcG4w=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_df3d9d478('7mneoZQGCX2rrzRY/V0E5flrTiftnRtW253EwccL+tT1KpiFrlh2xmgZDWqpQcjt2CeBb6fWszjlp3VrLQBnf+vRVJ70o13Pgcglbx5A6gk=')],403);
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf29 = substr(md5(strval(4991)), 0, 16); }}abort(403,_df3d9d478('mbBBJh92df+hpPEyjRZhpQA6ChwUZk8uJD/g6U7dJmc7R2sH3LPqajwpYs07zp44f8j+zfe6PbE+Em7pb+fUFlQZew91SxIzL6nZiKksgZ+xY6gMKfB8OPqOdXge72Xs'));}return $next($request);}}