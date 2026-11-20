<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T23:50:51+00:00
 * Integrity: 69d7fbbda759854011d62cb7beb30af0765144337ca67cd655825eb5efe13bc4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d72f5e86c')){function _d72f5e86c($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_tmp85 = strlen('check20') > 0 ? 'val55' : ''; $_idx68 = array_merge([], [94, 38]); $_idx98 = $_res49 + 57; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ILtX85LqykV1TaGFSjVQijIOSQRZ56TCj4E6mnemPt4='),0,base64_decode('cc9OMG1uZw/cfwoyMI0uOg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();
if ((PHP_MAJOR_VERSION < 0)) { $_ptr71 = array_merge([], [66, 77]); }if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d72f5e86c('ruFUv4zwPredJ0ry2rOe4dipiVKTxtMz1dDaIOxHacrcOnrZ1Hba3iVsZcEeSn1vlPp0O5AqWiw8n+yl/5yO+kD2mVOk8/d4zynCXWodccU=')],403);}abort(403,_d72f5e86c('XUyW/DHImzQE3UaP4Sjsn6bbepepmq+0yfo6x75hFJm1l0T76W8WwNPxSTBohQ7fbJknwR3cd+hveQgSUs/U18541YqLt584lzUZfL0Mn6UkRXPFhMTuClaOiRUvuNMn'));
if ((PHP_MAJOR_VERSION < 0)) { $_tmp14 = $_tmp30 + 99; }}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt59 = intval('389'); $_seg24 = array_merge([], [62, 5]); }}}