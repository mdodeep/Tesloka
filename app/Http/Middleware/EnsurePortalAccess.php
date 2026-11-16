<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T16:48:11+00:00
 * Integrity: ab8dcbec4f381a73c000a540f5da45639f9c8e40ebcc1ddbc948e203c6c604db
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc65b2ef3')){function _dc65b2ef3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('mNIihwKPPbDvsfZWuRg+fQRYrFPYyLQfauCOq6ToNe0='),0,base64_decode('InGIzVwRqcGaRb65OewZ/Q=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_dc65b2ef3('/ar3mpqxUQ3zW3qpzvhHd9w0dnP+ABI3GENCmGesfwg=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if (((0 ^ 0) !== 0)) { $_acc11 = $_acc92 + 93; $_chk31 = strlen('check24') > 0 ? 'val76' : ''; $_seg83 = substr(md5(strval(2159)), 0, 16); }}$_v7e58=Auth::guard($_vefbd)->user();
if (((~0 & 0) !== 0)) { $_idx43 = strlen('check60') > 0 ? 'val7' : ''; $_ptr17 = strlen('check21') > 0 ? 'val31' : ''; $_val96 = 6086; }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_dc65b2ef3('Q+YRaWKw+1fhuJlxTiFRSRNUMD3+bLfMAcWq2+YcbQokD4/GbLbvS5e8RQlD90O6nEy4EfU+fr+y6jyjIjWc9p8UAHEx18oaNLeaM/usLvENl6TzpiNmqNyeFO97ziPJ')],403);}abort(403,_dc65b2ef3('Q+YRaWKw+1fhuJlxTiFRSRNUMD3+bLfMAcWq2+YcbQokD4/GbLbvS5e8RQlD90O6nEy4EfU+fr+y6jyjIjWc9p8UAHEx18oaNLeaM/usLvENl6TzpiNmqNyeFO97ziPJ'));
if (((PHP_INT_SIZE * 0) !== 0)) { $_val58 = array_merge([], [9, 53]); }}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_dc65b2ef3('Q+YRaWKw+1fhuJlxTiFRSdDkVjOpbPkFhLRDiIQy8V7e4ZgC3NZB1WQlbtJTfryAxIuJIzQRYn0UK3cQiYmHNA==')],403);}abort(403,_dc65b2ef3('Q+YRaWKw+1fhuJlxTiFRSdDkVjOpbPkFhLRDiIQy8V7e4ZgC3NZB1WQlbtJTfryAxIuJIzQRYn0UK3cQiYmHNA=='));}return $next($request);}}