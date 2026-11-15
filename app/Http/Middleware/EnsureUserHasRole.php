<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:46:01+00:00
 * Integrity: e8b7360e754ddbca48c6d0f033057497835a6312b125fdc59f0063da2ae89ad8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7874a6b4')){function _d7874a6b4($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('xne8wMthTb0ewUAzf5GKcXyI4jsv0oPsB5B0cuLr8UY='),0,base64_decode('VSJYNGUaovQTNQmbnSufuw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d7874a6b4('/78vwV0N2JUV1jpgjlwNa7M4vxsaIBdmH3zD1jZAg5Guqdc5GPzIzjsIpRSCPOFbEsVfpD/78ca6pLg2ojlDEqpdOR82N1VAHl2/7utQdME=')],403);}abort(403,_d7874a6b4('INZSKfWQVgjvrpO7zSrAcFYEozXmxvXmDS5vgx9JA2mbcOlSnJ4Ujq/Ss9s/EMdi0zIEzVhyj/f4lRGpRg3f3fd+0hAp9+pKtW06UafUmP5ksgaR39WmO8q8v16vAP7I'));}return $next($request);}}