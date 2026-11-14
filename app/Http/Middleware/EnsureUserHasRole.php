<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T17:05:26+00:00
 * Integrity: 4410dd194bb6a0d4503dfd0abc9278e478a9bb28bbdc454fbb1eaac023383b1f
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d3a112a8c')){function _d3a112a8c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('4BHbYj1OeSueTpby9NnDuiZRF6v7A/yBRH+5WnGU5+g='),0,base64_decode('F4D4bI+P/CLG1JiXO0K7ZA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d3a112a8c('kWG1k16YhOCOiB07wjMxKcGjXlqKrT3mKbRjqUNrLaM8yR2ctyY9xU/tsT3ChzdP44tH1y01ug8gCXgh2HLXS9wPQAgHRGf7rzmRsFkWroM=')],403);}abort(403,_d3a112a8c('wQDhVPuaiQr9/iREBWOZKEHig9BMtVKmqhYLwyqkOiDnr3p1mDXE91kbueg3rZMKLAFAtzpIFp/1UTNxxci+u5MX6r1jjjDntYzoOlzphLXko86iVbKwUtbMVeqKwuCM'));}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_buf70 = substr(md5(strval(2646)), 0, 9); }}}