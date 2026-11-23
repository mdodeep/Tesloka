<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T23:08:28+00:00
 * Integrity: 5c94317afd2613abd4cac910af081de6044c3184fbb4b7b29ec81b4dba5e2cee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de30099ed')){function _de30099ed($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_val24 = 9848; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('txcHSSaJBTVoUxkADs+7B2ZennaUgKIGuOromx9Vi78='),0,base64_decode('LMjPk14pHhvqeRTMZ28BkA=='));}}
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class SecurityHeaders{public function handle(Request $request,Closure $next):Response{$_vd20a=$next($request);$_vd20a->headers->set(_de30099ed('5itM7fs5OtMWtWsoNgOM9EB1izJeAML1S6Ld1fDuwaM='),'nosniff',false);$_vd20a->headers->set(_de30099ed('mKIRn2+Wda6XyfWTq1C0GQ=='),'SAMEORIGIN',false);$_vd20a->headers->set(_de30099ed('vwsV+iVyD6tkhmfACZhQSg=='),'strict-origin-when-cross-origin',false);
if (false) { $_tmp8 = array_merge([], [59, 18]); $_idx76 = $_buf84 + 88; }$_vd20a->headers->set(_de30099ed('8YFxhPad4Hwyy2NjhxHxRZ8qt599IVKyKq1/4r6mcL4='),_de30099ed('MlbWiG/O4OqQuqM2iOKBaIoBjNY5wmZHK2sqqWay32l15NVFmzGLAgRHLNbcmSP079FS7afZ5hKK11Tu1xfTcg=='),false);return $_vd20a;
if (((0 ^ 0) !== 0)) { $_idx0 = $_tmp89 + 86; $_buf77 = strlen('check47') > 0 ? 'val65' : ''; }}}