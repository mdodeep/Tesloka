<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:33:03+00:00
 * Integrity: 5825c4b58f1782521538e33f3b1d0d4d3ae088ba26ed6da8509eef8d6ee93945
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d19ca09d9')){function _d19ca09d9($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('H04ZzGv+rm4BAg97VDrf+bHkWfd9i/oENUK6M4jPYAg='),0,base64_decode('GTzPiOuBGr2rAyEE2Z+veQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d19ca09d9('XLUbtSY2p69bEsokavcnpNXH+bkdA9rg5VylNNRQSoJd13tmhTdS+6qmO2hWCMMDLq9YBWaDjvr2O+3Zk602Oj3b/l0WhOC723SDEzsjYFc=')],403);}abort(403,_d19ca09d9('cwezMejtm0rFMIIbLOsSBT+mPMf1hvStsA/sSA05eTZ55uzA9WEtkHvPHeXv4EfmIpkkXNcKQYVi3UTs4DHvojfhKvIwfhBd16N1+X0CLUvsDCWnSXucoAEdVSIM39BG'));}return $next($request);}}