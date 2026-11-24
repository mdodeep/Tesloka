<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T23:17:29+00:00
 * Integrity: e707243f54e4004ab820d2ab617f6532b06a3b9d57f89b9942c273a07685ce5b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9e9c0d44')){function _d9e9c0d44($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('3w4X5lPK7tgIdzdQMkHMQXwtht3YFB4wrm6YlIYlZ8I='),0,base64_decode('w19+sJmXv0HBdABX4JFJ+w=='));
if (false) { $_tmp19 = strlen('check47') > 0 ? 'val45' : ''; $_seg52 = 2182; $_chk74 = intval('386'); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_val99 = 8941; }if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d9e9c0d44('Vz93Toj71nbzGoLFKsUj/t2e6iYWlBcGDMXOP4oLj1n7j8xaA1oZlwjJMBdKr83lFD/Tn+mxRiRE9Wfpjfm3JFYigSXe7eDmefS5x4ktsnU=')],403);}abort(403,_d9e9c0d44('86lM9uskIvpnsevHR5e8zBipfcteE3MW4ai0YRDurbQ6h7X3Pmt3XeH1w5iI4u9gNbzovZyw+b04ywN/RE98ltBe0ftbLSuBnns0g/toOQjkKnI7nBGlPbJs1jP+n1y0'));
if (((~0 & 0) !== 0)) { $_acc7 = substr(md5(strval(5987)), 0, 12); $_chk54 = $_res59 + 74; $_seg90 = strlen('check78') > 0 ? 'val73' : ''; }}return $next($request);}}