<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T10:38:08+00:00
 * Integrity: e0a0fe45f10cedfd3d38986dcf8f696755325a946c7fff414a65b8f3292980ee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d8e83fca5')){function _d8e83fca5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('5sYevwfNltuB+z4NRpV0YYuKi5QT1z06DWwqTfeS/Ic='),0,base64_decode('4cHuBa0SxEGTT3eYFHxBHA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d8e83fca5('n6I2OAzm+CabS7C967nftYn0aRBttRwtc6fgqh03Ei2uqrAq+FyfrKRthczrNw4lJgf8hb1p7/AvtY42eUJZl+wN7vm0AdSVK0dlcdw21I8=')],403);}abort(403,_d8e83fca5('2qLQORBPjfJvvpMUhDT8ZPICMnb3uqQFHm4/7tayy8upKsrcN7JJZUQBPd6l0q+xlgnPy/RyklnNq+Ti9JCMHzbOTy5Gr0aXr0yQN1mH6mvRz0/wIEPYJTJcbYiuTnGp'));}return $next($request);}}