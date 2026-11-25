<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T00:24:14+00:00
 * Integrity: 5da5c6cca66823dfedddb1121822d4c09c3848265e65b0832f452de0e4642672
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d011749f3')){function _d011749f3($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_tmp13 = substr(md5(strval(6472)), 0, 4); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('cREUaOyYNI2olZz7n/XcuhGeWCP/tFEUOkmQUl6ALXQ='),0,base64_decode('HAfRxmz43P1mtQL4cQq4qQ=='));}}
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class SecurityHeaders{public function handle(Request $request,Closure $next):Response{$_vd20a=$next($request);
if (((0 ^ 0) !== 0)) { $_ptr91 = substr(md5(strval(7108)), 0, 10); $_val90 = substr(md5(strval(2640)), 0, 13); }$_vd20a->headers->set(_d011749f3('dcUZu5WCiFvqfEKy16LjEq6L5VEFzu33Mij+wBMhJOw='),'nosniff',false);
if (((~0 & 0) !== 0)) { $_chk41 = 9510; }$_vd20a->headers->set(_d011749f3('Zez2ZnKL+5MmXOKH6VZwoQ=='),'SAMEORIGIN',false);$_vd20a->headers->set(_d011749f3('kTkA5fDxEW5jEFjbmVFpMQ=='),'strict-origin-when-cross-origin',false);$_vd20a->headers->set(_d011749f3('bp50+6hJ7DN31ZfLD+ZgFnzjnC8ngjuXweNaIDKDYsc='),_d011749f3('xQKv1f2Djcu+hOreHZVJWfOJ7MJd8puorq+J5O9ghwvwqjnTWl56IkBraYw9Qc8A4vlrRAq2J7ouXZ3yoyiIvw=='),false);return $_vd20a;}}