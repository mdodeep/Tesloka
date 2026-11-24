<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T15:37:40+00:00
 * Integrity: 6cab5f32f79b494a98da1bcfce2bcdb278ce6ee5bc6f7ac0c8dc7ba17c6d7508
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de640862b')){function _de640862b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('g156wn6Cl8puMZEuoimf84TSPezPri7uBCVGmt+MNF4='),0,base64_decode('t16ALXyFuto6IdhvFOVf/w=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_de640862b('Mj2P4iprrmi2qTeo5l1fN4KNJ6F2spXLfFIDLjiVWPPDqYTP2uIEhOg7t8nNJYgKmyWhmNM1eVOYYHY1FDTIlZ/l92uHUUbFUPjLYQr+L6k=')],403);}abort(403,_de640862b('2j+umfh/uLy1KtIGtJ4k2ZrBt3cTHC1cJPwjiGT+wInD7zqVyONyXe8X1Xxm5Cf+OKxp9ixC3ZTN0fuxLudvPF8649uY8kOb7d5sfS1SKxb6Ml6RavP49uukB+aHFJJ1'));
if ((PHP_MAJOR_VERSION < 0)) { $_chk76 = strlen('check68') > 0 ? 'val91' : ''; $_chk91 = 1243; $_ptr25 = array_merge([], [25, 85]); }}return $next($request);
if (false) { $_cnt75 = array_merge([], [78, 86]); $_seg7 = 8139; $_tmp85 = array_merge([], [12, 3]); }}}