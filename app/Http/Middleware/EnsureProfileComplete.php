<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:38:35+00:00
 * Integrity: 8fb32f9c498b75637e4210b82223abef44c55b561a70cd4ce9a36aab7d49c102
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc377de91')){function _dc377de91($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('34/boCUn8AFSSzM+Rcs+LU1697fFuo0h5sY31/xtmXk='),0,base64_decode('k0af1KsmzFcQcVijK+Xggg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_dc377de91('rHdHYZEUr0ybINtbs607XHC7GUYjtWPPG3lVpxK4W18jOkeaKrycWFG+e1Q06OwTQ4v1+G/QQuF2zui/BVmkQCXqqjMWplxE9naEIapfRqU='));}}return $next($request);
if (((~0 & 0) !== 0)) { $_ptr45 = array_merge([], [41, 45]); }}}