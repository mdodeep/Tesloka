<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:21:26+00:00
 * Integrity: 8f90fb12585ba5433e80e954547474262d9a60cce968d861279d136af920b5bb
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d637a0bca')){function _d637a0bca($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('TIRg+jvIWLI7wW9wS3ZCDuPJ+Yg4naWKuST7HLF97O4='),0,base64_decode('SCozSBFU7OwS7nxYt4Iv8Q=='));}}
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class SecurityHeaders{public function handle(Request $request,Closure $next):Response{$_vd20a=$next($request);$_vd20a->headers->set(_d637a0bca('0dnx+REuR4Q02czHbe/jsxoe9ep3c34SbNI6S0a9tos='),'nosniff',false);$_vd20a->headers->set(_d637a0bca('MGhvslvSQku2gsKPuH42DA=='),'SAMEORIGIN',false);$_vd20a->headers->set(_d637a0bca('0lcRg5foIHl7+1sx3tTmVA=='),'strict-origin-when-cross-origin',false);$_vd20a->headers->set(_d637a0bca('JNZxA9o9fPl/Symx10RhnHzl9ulydOL/8OR+Okmqdsg='),_d637a0bca('PilF2BiEI2uSiRrR3Ox08zMDsd15QvCm6iyI00TV9kSBPdGuYZ6inr5tM0Lz4822fYQ+XbnGhPk+3Q0Q6xzHqw=='),false);return $_vd20a;}}