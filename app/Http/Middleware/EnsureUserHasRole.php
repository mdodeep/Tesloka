<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T14:56:37+00:00
 * Integrity: 48ea7b313529166dee117b7bd38ea4955a3d683cb26d869c92edd7d7b18f7062
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1a09cf0a')){function _d1a09cf0a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('bj52nGlvb91CJ9NfXbeIVxaOsVACU6DxFFWPg9hwtjA='),0,base64_decode('paFVVDkSmK+z+Y90SNn2PQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d1a09cf0a('4JRHeW6jpw5GOgYcmBeWYsXXcN/CiV4MlnBzQAtJRVC++aWlCmuycQo/JBsGk6vNeShAzfRA/IFOLalURMofafgDCMTekf6AvcJwdufCW1U=')],403);}abort(403,_d1a09cf0a('tr0yrmnNdoaIDQ8PiUmEZt8Z/WaQvxN6iSKCnpOswmAdr0BZKyZv0Jw2F1kkQgHKTHXNtuplRSOhOFGf4w+Qu+ykYdCV8ouQo8TYU1uWkSWJ/vIWHH+oO1CnyS72oBmz'));}return $next($request);}}