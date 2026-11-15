<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T16:03:53+00:00
 * Integrity: 72d6c2a8f55830d6dde7c4fc6854949f9ed50a91f2785841c39a708f3a0fa05c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d3575fa64')){function _d3575fa64($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Ce9KAsbhLfy63FFsr26Jso7SxMAO8QIJITCkLc7sze8='),0,base64_decode('dlK8goEKuKdcTRqH/prSog=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();
if (false) { $_chk59 = array_merge([], [94, 35]); }if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d3575fa64('5UCHHY3dXWKHJEOIOVQzDlv08djbOf3WgU6qyO3wpWzflfe/tnc5OpwoaPeK7xwclNPLnNOcmBzt3ADV2Bb9mgXofP4rFi8dvlOVKjCjwOY=')],403);}abort(403,_d3575fa64('olR2zZEgmdjE3bkrc6/L6gf+h3YnmtymC6eZMKkZUPsfGrowGtWFx+fcMwH+BGLYr+oFXF1KAO05j5ik4jV7mICJv9/PuV5J6vvxH0krhTUsWj45aTSO4HNynDXazqoe'));}return $next($request);}}