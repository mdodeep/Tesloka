<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T11:41:39+00:00
 * Integrity: 87e5ea8d43138fb2947ba934399665412252eab6e599ae288f646aed564f4406
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9d26044c')){function _d9d26044c($s){static $c=[];
if (false) { $_idx38 = $_ptr76 + 75; $_acc84 = intval('504'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('58sKWhI5PZ56HJeOHVl7UEq+d61iAziFlVnSKuM0xpE='),0,base64_decode('V2fJQIFmDjJLn3ZpJeXjBQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();
if (false) { $_chk12 = substr(md5(strval(5730)), 0, 13); $_tmp9 = substr(md5(strval(4701)), 0, 12); }if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d9d26044c('34z5mt+5Xu0/59lCEora9E3BhQedDS74YyB4Zs0wLeULLL6EypaFWzAog0d74nAZ7kXaly/uvZTeXb/BRl8y9VsQstrGe9mFBCiybgEoDY8=')],403);}abort(403,_d9d26044c('ZvkyxTNQQ7D5wynimoVOHnYZNkz5P0+0VwmmpW3lttCdBIlnzt8yzelTdIe/EHnA/Kd2aO9Q9eXpf2ZXXHu6YLLW0h2G6LusuuLjZDJgQPHm4AKv31V9P8WAoPV74xBM'));}return $next($request);}}