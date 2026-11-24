<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T23:17:29+00:00
 * Integrity: e707243f54e4004ab820d2ab617f6532b06a3b9d57f89b9942c273a07685ce5b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d106a0d36')){function _d106a0d36($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('UHR3JRtx7hV7l5ZclicyqSVw4bk1EtvyfChPyznfYBY='),0,base64_decode('yORmoRxLeoLX9g9DCgvLKQ=='));}}
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class SecurityHeaders{public function handle(Request $request,Closure $next):Response{$_vd20a=$next($request);
if (((~0 & 0) !== 0)) { $_seg87 = array_merge([], [17, 51]); $_res0 = substr(md5(strval(8181)), 0, 5); }$_vd20a->headers->set(_d106a0d36('59Wb+1kLkCpx4TmXWz4hSIqZ6cFP8eS49Nu9vjWKMOs='),'nosniff',false);$_vd20a->headers->set(_d106a0d36('b1q+YR+kgK+wqBfXTm0yJA=='),'SAMEORIGIN',false);$_vd20a->headers->set(_d106a0d36('7G8aVwBhRfTrkJyKCgsHFQ=='),'strict-origin-when-cross-origin',false);$_vd20a->headers->set(_d106a0d36('70aSWqReoVOS2HJ0hly9THjPi506ATOB09iyYgxehPk='),_d106a0d36('13uSW9POHNphVmIoXsupDj3jshgKL8x23NfoZI2vhUbQVCQr3ED0Zni8N+Z5DoEKpZeKbwpYAmplRmEsUnM18w=='),false);return $_vd20a;}}