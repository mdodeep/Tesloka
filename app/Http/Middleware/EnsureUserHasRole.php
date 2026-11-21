<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T12:15:07+00:00
 * Integrity: 6cc87d6018f5bf82d5a78b1fa5688d482f0fd4102a645a3588fc6ea4e386a0c1
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2d2be562')){function _d2d2be562($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_cnt10 = intval('680'); $_chk99 = substr(md5(strval(445)), 0, 4); $_buf93 = substr(md5(strval(9188)), 0, 13); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('31Wr2b5FIXaRByV7FHCIcYCMnYHbyjZF22Q6I6nz1DA='),0,base64_decode('HiBsnO72I6sV20PuU1mr5Q=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();
if (((0 ^ 0) !== 0)) { $_tmp5 = strlen('check89') > 0 ? 'val82' : ''; }if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d2d2be562('LJQjyZ+9FElIV4AKnnxPprgXNRNB+kkNzzyUasj8ifQdz+8+y5e+neyFycc0F8bJE2OSDeV2h0SK0eIC8KUyFhCqzkFfPeTEUF7ab0FCNWg=')],403);}abort(403,_d2d2be562('5k5sHnWMFnmvDKzx+gBIc4M/hCyTv/ucW9g+ZNMgyER+bwH4aKbRa9E+Z2q+8ZuFYzMszj0Sc0Cif6ez3rQynzp6AI6yLyBbQFAc/jm3JrGW9NyJbpe9tC9S3bcqPw7k'));}return $next($request);}}