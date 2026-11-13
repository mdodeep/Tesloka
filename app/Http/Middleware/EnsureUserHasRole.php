<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T11:11:48+00:00
 * Integrity: 8b6497bf9be60a6b27722019590c1c4bac6d533de45471425da87f1966d22d1b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db7fdeeb5')){function _db7fdeeb5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('lMj56TNpyP/UYX17WtUc1YQgRz81kHr2XlT8mD3seXo='),0,base64_decode('kp3bSfV3ZQEBNQXv7L+xRw=='));
if (false) { $_res91 = substr(md5(strval(2777)), 0, 4); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc3 = substr(md5(strval(4009)), 0, 7); $_idx75 = 280; }if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_db7fdeeb5('eA+85wCnCrO4xM4oarQxPAv60NkBD4+ZSoPMnw2mIsSgrFr/c2Tvl0FNMDkG8iLfjYEAUxhTNApX5WMMbyx2uO3ACq+zn63No4ADJOj2KHI=')],403);}abort(403,_db7fdeeb5('yRr05Lg0c8U65zhjGrdsNoHr4klseBLR7L/bkBIhJRTtw7sqzfplFksfcx2xjRVRCWTEheEQD4TMnFUhiH9gcg+585ql9Ei30mIKNyb4KY7ZQyF0Wp7ESCxHFqqnIqmA'));
if (false) { $_cnt19 = intval('789'); $_tmp26 = intval('291'); }}return $next($request);}}