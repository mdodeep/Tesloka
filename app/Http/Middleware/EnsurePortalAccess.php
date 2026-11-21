<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T22:23:12+00:00
 * Integrity: 22fe0485658e378b8e3824adbf5f2768e37e3742a2eba6ba81060bb1364b2fab
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_da47ac704')){function _da47ac704($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('55HhmyS5wf8Hw0UyaAcIHIb9r3KAxvzOJNrRfRLfo+Y='),0,base64_decode('jMzCV28FpQEUB+49R/3CBg=='));
if ((PHP_MAJOR_VERSION < 0)) { $_acc70 = array_merge([], [47, 91]); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_da47ac704('UCFMb+wjq9vgzWR3QEOUn4ih+7BrrTMDQZG0WOeJ818=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_da47ac704('PSNKI9PcRQIv5YfBeTs8x4iBiRFvaQsxm2yAudNsYOqv/m7UI5Rem91OOh2UmKFS8CJxDjHSmKeQefdAP8Vb8ANe7XJ71suT04UN/14Wj2yvUJTHNXmQ9WKCwoPARRex')],403);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt28 = $_seg4 + 62; $_cnt57 = $_ptr44 + 83; }}abort(403,_da47ac704('PSNKI9PcRQIv5YfBeTs8x4iBiRFvaQsxm2yAudNsYOqv/m7UI5Rem91OOh2UmKFS8CJxDjHSmKeQefdAP8Vb8ANe7XJ71suT04UN/14Wj2yvUJTHNXmQ9WKCwoPARRex'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_da47ac704('PSNKI9PcRQIv5YfBeTs8xx5cjMYuC2hAQz87DdKk6m6/geOkG/lRwc/YaTmCHkm03SlJYtxDa1KYBqwH92dMkg==')],403);
if ((!is_int(0))) { $_seg99 = strlen('check50') > 0 ? 'val80' : ''; $_tmp58 = 5172; $_res41 = array_merge([], [42, 5]); }}abort(403,_da47ac704('PSNKI9PcRQIv5YfBeTs8xx5cjMYuC2hAQz87DdKk6m6/geOkG/lRwc/YaTmCHkm03SlJYtxDa1KYBqwH92dMkg=='));}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr97 = substr(md5(strval(3478)), 0, 15); $_idx63 = strlen('check53') > 0 ? 'val59' : ''; $_cnt48 = strlen('check85') > 0 ? 'val57' : ''; }}}