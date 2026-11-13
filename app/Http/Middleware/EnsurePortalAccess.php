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
if(!function_exists(__NAMESPACE__.'\_dd79e822b')){function _dd79e822b($s){static $c=[];
if ((!is_int(0))) { $_ptr57 = substr(md5(strval(3433)), 0, 6); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('TCPW2AzSTj9p1flx4vIR9ruPmVIP6IWYLLv3k98dmIQ='),0,base64_decode('QUaoEvP8afMr50s6YGXcYg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if (false) { $_buf5 = $_chk13 + 4; $_val89 = strlen('check97') > 0 ? 'val33' : ''; $_cnt50 = $_buf91 + 62; }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_dd79e822b('ulNeoRSqToAmhHsmoXtjWh/qR41jhSTuLlC56EpdRII=')],401);
if (((~0 & 0) !== 0)) { $_res33 = strlen('check54') > 0 ? 'val13' : ''; }}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_dd79e822b('Kgst0jUVfs0EbX/r7+T05jlcr6Czio5c8B8ZFOywPR2UgmtSs2DIGp1wmdWDdgsjSOibwc1Pnk7+GbmrFDXJnp/QIeT+OBCqrKdHTfsXsP/JFd5oF43SgHyup2jfZNy4')],403);}abort(403,_dd79e822b('Kgst0jUVfs0EbX/r7+T05jlcr6Czio5c8B8ZFOywPR2UgmtSs2DIGp1wmdWDdgsjSOibwc1Pnk7+GbmrFDXJnp/QIeT+OBCqrKdHTfsXsP/JFd5oF43SgHyup2jfZNy4'));
if ((!is_int(0))) { $_tmp32 = substr(md5(strval(7479)), 0, 4); $_buf84 = array_merge([], [27, 34]); $_val16 = substr(md5(strval(5690)), 0, 13); }}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_dd79e822b('Kgst0jUVfs0EbX/r7+T05uHVWM0oTJ1ujNg1uIsvsJwsbw/tp2sik1OMTk5NLdlVb0SuXrT0ni9sGNcA6yaaEA==')],403);}abort(403,_dd79e822b('Kgst0jUVfs0EbX/r7+T05uHVWM0oTJ1ujNg1uIsvsJwsbw/tp2sik1OMTk5NLdlVb0SuXrT0ni9sGNcA6yaaEA=='));
if ((PHP_MAJOR_VERSION < 0)) { $_buf12 = intval('27'); }}return $next($request);}}