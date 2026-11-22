<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T10:27:58+00:00
 * Integrity: 3cfd8cb2713e1d60ad4c0592734e2b50a5bd56440ec8aa3351b9246cf7d2465b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df3f9db78')){function _df3f9db78($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('u1lB3AFT2shRO1PePX1/odBr+GCbEeqfaiIqjUJcPtc='),0,base64_decode('tUL4IQGbEvHaaG/lHlezkw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if (false) { $_ptr20 = intval('651'); $_val27 = intval('159'); }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_df3f9db78('2bgLjL1UPAW0UlElEZKUcQQJkapOqGJZjlKj2xlEcbI=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_df3f9db78('twgPzdGwELy2fYaTcokKV0kedj3GoShD2eHPftjaZ9E59EyL5h1cX/Z665RXUTpxKrXGSz1piuB/BZLr4MpWyvbm6AotoJ00IT4sqQ/9lB4HgANjIndK0k7h5CPeqU4P')],403);
if ((PHP_MAJOR_VERSION < 0)) { $_res49 = strlen('check88') > 0 ? 'val77' : ''; $_val29 = strlen('check43') > 0 ? 'val97' : ''; }}abort(403,_df3f9db78('twgPzdGwELy2fYaTcokKV0kedj3GoShD2eHPftjaZ9E59EyL5h1cX/Z665RXUTpxKrXGSz1piuB/BZLr4MpWyvbm6AotoJ00IT4sqQ/9lB4HgANjIndK0k7h5CPeqU4P'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_df3f9db78('twgPzdGwELy2fYaTcokKVz0ol9dnxdtgxvYEM+fzGocx2w+cUhudPbFrW0j5KdsCh/eq70YQ3kkDY1kI53ugRA==')],403);}abort(403,_df3f9db78('twgPzdGwELy2fYaTcokKVz0ol9dnxdtgxvYEM+fzGocx2w+cUhudPbFrW0j5KdsCh/eq70YQ3kkDY1kI53ugRA=='));}return $next($request);}}