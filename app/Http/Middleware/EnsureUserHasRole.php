<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T23:08:28+00:00
 * Integrity: 5c94317afd2613abd4cac910af081de6044c3184fbb4b7b29ec81b4dba5e2cee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d14f63f2c')){function _d14f63f2c($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_val48 = strlen('check60') > 0 ? 'val73' : ''; $_seg42 = substr(md5(strval(3825)), 0, 11); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('tzoCO6xS+XEQhalCDyzuM15/kl5vyF0d7jAWLNxv85w='),0,base64_decode('GY92aQx5JmdljAWp0UnbiQ=='));
if ((!is_int(0))) { $_val13 = 5567; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();
if ((!is_int(0))) { $_ptr54 = 9145; $_seg32 = $_seg20 + 86; }if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d14f63f2c('DQF4BU029shCzUg7iBi49e2MHhaA4p3zqy4W9gt1Eldpd9QTTdqcTPpYi5NwkfQB1Uisuon+qqb2WRmZp2blRWpTVbFiMqSh0hXNTOxi4rw=')],403);
if ((!is_int(0))) { $_ptr3 = 7162; }}abort(403,_d14f63f2c('F2Yurudg8mlsTNRO2r4MoN/m5vIT9zwLrsSRaXxsLOy3eMTFmkjrxaZFw+mp3d+Mc2fXuu6ZnS5UqM0wo3u9XppbNrHT3YqjygHhc08dhWG8WHD3k8riJcLKvsJI7lZJ'));}return $next($request);}}