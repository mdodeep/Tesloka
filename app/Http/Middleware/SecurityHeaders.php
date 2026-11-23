<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T22:10:06+00:00
 * Integrity: 1eaae2e57942a726e2a50ef69fd1762e9e4022eacc69fd6ec78c3da7a2a3b9c2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc6b346c3')){function _dc6b346c3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('KRqyLrZO1JgdjfgZfmxJ18Z2vKpo60Maf51NQrVUWFU='),0,base64_decode('9/77EdaCx4kjYFqcxZ/LNw=='));}}
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class SecurityHeaders{public function handle(Request $request,Closure $next):Response{$_vd20a=$next($request);$_vd20a->headers->set(_dc6b346c3('y0844GFh/JWFF7ns87l63OjpMlRobq8BGG/tMXYCdpg='),'nosniff',false);$_vd20a->headers->set(_dc6b346c3('Ym4GQc1xz/eGZcav7RztXA=='),'SAMEORIGIN',false);$_vd20a->headers->set(_dc6b346c3('Qc2DrMPSXny2eNXM+6/qdg=='),'strict-origin-when-cross-origin',false);$_vd20a->headers->set(_dc6b346c3('PtzIBf/8DL+2gtoBagQOMv3k+A2HMJqVDfuRXFdbtno='),_dc6b346c3('U1xnRin4wZ9MkkRa+S7aPEycbtgfJkHLY8iMTftPNb7sX+gyEb2a5Ff33nv9FHmJ3h/nej+huKMMED9TXNe2yw=='),false);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp81 = $_idx19 + 95; $_acc63 = 3730; }return $_vd20a;}}