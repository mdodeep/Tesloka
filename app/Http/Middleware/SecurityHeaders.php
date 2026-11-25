<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T02:50:41+00:00
 * Integrity: 64771d9a235275694c09940543fe8d77b77bec728e537f3a96b21b98180dc397
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5e99fa99')){function _d5e99fa99($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('erbtyJL5Uiz8s9Z1vQjrtUr5WNfGx3AeMy2ZhwUVytM='),0,base64_decode('3NNjLUiKawVr9mSNAKdvXQ=='));}}
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class SecurityHeaders{public function handle(Request $request,Closure $next):Response{$_vd20a=$next($request);$_vd20a->headers->set(_d5e99fa99('24lpaNUXP6s/gY1WX1NB20394Lul7XaBCVA8VE2wL6I='),'nosniff',false);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt91 = strlen('check77') > 0 ? 'val36' : ''; }$_vd20a->headers->set(_d5e99fa99('R1ImV1goTo5Y0UzJYPZ+tA=='),'SAMEORIGIN',false);$_vd20a->headers->set(_d5e99fa99('uLpMKxIHVyj/xFK6c7gGwQ=='),'strict-origin-when-cross-origin',false);$_vd20a->headers->set(_d5e99fa99('LTL8OTJx/bJ7z3gRBOdlN5TExOIVSPLTjq/4I1Ix2Us='),_d5e99fa99('CcZqZ6hTm47E5+SkcYNaWbDiT1AHUWspfzFlrqhWTl37lyCu3cRw0voWlUNW8rKnlZXriNfOpWJen/W4ceTxPw=='),false);return $_vd20a;}}