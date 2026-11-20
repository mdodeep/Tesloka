<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T23:12:53+00:00
 * Integrity: a306dc4c788eb6eaa4a2c3f208f02c66d20642bbc37e89cdc2c9154b697bd1aa
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1765c2dd')){function _d1765c2dd($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ivWgeUSrk7lXrUAKDrW68sqP/kkJzac9jJm6bHFW/D4='),0,base64_decode('z65O951IKe9OuYF4Zdds5Q=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();
if ((!is_int(0))) { $_cnt30 = strlen('check61') > 0 ? 'val15' : ''; $_cnt30 = 1491; }if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d1765c2dd('TNc8/9gdcn/pdb2cmpEjuXweW0Mc/QFfD4qddvUE+l6JQHFIrUgdZRnqvMWt+iyFApf7M4lGIHxdMK5Vs1qF4P9sr7ph5oMWR7JRac5gPTc=')],403);}abort(403,_d1765c2dd('NkSJTh8XovtHjyjMWBBDoUYEaax0NTP1WdPPQ7VCnKuVul72okSl9IVA49rmXjn+wxx2yqdeefh3VnycNGrrjMQzZGokTp6g1263rXlu/q2Kge1A0DXKFX2tvsrWTPku'));}return $next($request);}}