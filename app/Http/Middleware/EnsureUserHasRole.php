<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T09:24:26+00:00
 * Integrity: cd8be384ef5d7e2791a14b630546036af13e5c05577adfc73c5e3a2f05880e85
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d3a0b3d14')){function _d3a0b3d14($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('mvase7bS3EEYPF/fJlaSOCFHReCKQ1yB56ehgw112fk='),0,base64_decode('Z7L01ofiz5v+YR1awXH3Pw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d3a0b3d14('IBvy/We4BrcAnK5EEGthHJd8VSFhkQgJrjTC5o1PZRSb0+V8pVuTbssfJl+9pvxtK0hXS7jQtvccT7o+lRh+gwufFYV3KSOuQ7/ZGG6Mg6Y=')],403);
if ((PHP_MAJOR_VERSION < 0)) { $_acc87 = substr(md5(strval(157)), 0, 13); $_res87 = array_merge([], [14, 67]); }}abort(403,_d3a0b3d14('r0dcGwymdBL6rzLY/rUu3Mwh729DDXa3pSRku+HBozZracaouTlVdOCFXUNyJLi4zn5pfc1Cd2xHSRANdRL9ABIsrnV+RNymgY6aSQlsudZqh1iHmrTXcuyHuTNM0Swl'));}return $next($request);}}