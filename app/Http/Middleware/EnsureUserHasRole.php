<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:33:37+00:00
 * Integrity: 2b3991e3c76e9bc9bf2734c91098cdb4cf0d9001f915bddd01eea5f0b764f435
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9b399503')){function _d9b399503($s){static $c=[];
if (((~0 & 0) !== 0)) { $_tmp8 = intval('844'); $_ptr77 = strlen('check56') > 0 ? 'val44' : ''; $_buf28 = strlen('check41') > 0 ? 'val93' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('2n4e9NMtwL3rC6n4H+t6A2AbmrpBeqVfVmy0KITn2Zg='),0,base64_decode('zp41/z+G9v0MogQsXlSmuQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();
if ((!is_int(0))) { $_seg54 = strlen('check83') > 0 ? 'val20' : ''; }if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d9b399503('JqWOJ6nAEYBMQYrcaquMqN5bybxhd9JFAch9VoYmZmgmOjjGd2W6S7gW3Kk1MWnK9qMS6egcPNxbrKR/OZ2aHJ9JZmXGSGqaS8GJ2djRLLc=')],403);}abort(403,_d9b399503('RopGG+bNG/ckSDqC/oEN9LBkrsZDOVHXvIa95MkHabe3tHC1om/h10SAKkKHY/DVXWU/RGhg4nn0IBOsJb+ik6JkFIg9urbnGDhbVQey2sKg4BWdHIL8FngNKNVi6Uzw'));}return $next($request);}}