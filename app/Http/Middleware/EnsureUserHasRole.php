<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T13:06:37+00:00
 * Integrity: cf1490e0e40d44e80b28fdf590044dfef46bee366998158e0ab499e7710c3b23
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df28b06ba')){function _df28b06ba($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('LZI+nBSgFq+MT0tcvJZWAxEzjd9U9AKJesZch5YNux0='),0,base64_decode('xbjJvUoO9H/h+I2KehdHrA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_df28b06ba('dg+GbQRyo5rlTTGGHWiipKa5s881RQdczVaJ/C1+wYNhsARQqV24SaIGI2mAvcFB2it6ZyRrRSupLoqiElqmKwlPniABxzmF257jPZ5gn7I=')],403);}abort(403,_df28b06ba('yySaIk9d04Mh430Y4dZwlhRtI84EG1IWtuJRhC/m9JpM87DI6NjP+EGxSmo938uaVPDq7McR3zi7vsrV9JrEHvbZR0Phf0sUIzp0SB6vGAGPsAOYXfoLzOrg7f8z4VcU'));}return $next($request);}}