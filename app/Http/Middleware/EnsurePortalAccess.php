<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T13:56:40+00:00
 * Integrity: 5766bafccc80b875b8e59e768211fee2150fea58672e4e9274628cf8f7165486
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de8160877')){function _de8160877($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('TVTqR1JNjy3kV+Lcwc9/HMYhw/ozLVgPWS57GzUcpoI='),0,base64_decode('BqwSIg9vayI2IqHtXHUt6Q=='));
if (false) { $_buf35 = intval('653'); $_cnt48 = $_ptr97 + 64; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx66 = 674; $_buf33 = $_res0 + 13; $_idx83 = array_merge([], [1, 10]); }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_de8160877('MBk/3n2GkSGYCgJVUqt3FVX+bVBU337qG+Jb3WdA2Cw=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();
if (((~0 & 0) !== 0)) { $_idx71 = array_merge([], [61, 46]); $_val3 = array_merge([], [3, 30]); }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_de8160877('UDftq40GzkQ1qZYVMm4gPt2GmT6V/YS3Oiw6I9vwNnJiWMCr8NyuWHeu3lf5FADfI/3vd1VSztGQJq/UmDcN0a+XjPfUcMu5pZbmGFVF3m84wyx3nWsR3fmP7U04OCOV')],403);
if (false) { $_val60 = array_merge([], [24, 38]); $_seg88 = strlen('check16') > 0 ? 'val84' : ''; $_cnt44 = strlen('check79') > 0 ? 'val64' : ''; }}abort(403,_de8160877('UDftq40GzkQ1qZYVMm4gPt2GmT6V/YS3Oiw6I9vwNnJiWMCr8NyuWHeu3lf5FADfI/3vd1VSztGQJq/UmDcN0a+XjPfUcMu5pZbmGFVF3m84wyx3nWsR3fmP7U04OCOV'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_de8160877('UDftq40GzkQ1qZYVMm4gPm2PitHPbCctjsXdMvvhZ28KtdC2STZo1PV92j9pTIPHZAo2BudjL1hKN5biE6b19A==')],403);}abort(403,_de8160877('UDftq40GzkQ1qZYVMm4gPm2PitHPbCctjsXdMvvhZ28KtdC2STZo1PV92j9pTIPHZAo2BudjL1hKN5biE6b19A=='));
if ((!is_int(0))) { $_val75 = array_merge([], [79, 4]); }}return $next($request);}}