<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T02:29:15+00:00
 * Integrity: bf398720bd9a3bd753e409fc55455db0d0d24680c20966a4ff9c3742bc0133a1
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5b4ed52e')){function _d5b4ed52e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('7INgwoNwYYqpnU97E+0SrCjiifFD3+zoLNbDCiWtcLc='),0,base64_decode('8tkyKFMpESsYKGrJcxgnvw=='));}}
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class SecurityHeaders{public function handle(Request $request,Closure $next):Response{$_vd20a=$next($request);$_vd20a->headers->set(_d5b4ed52e('RYZMr3svLqEnwyCRUuSqc2e/GZv2o837R7aTfxsDhmg='),'nosniff',false);$_vd20a->headers->set(_d5b4ed52e('Me6q3kSXW5mvQ4Vo+2SoZQ=='),'SAMEORIGIN',false);$_vd20a->headers->set(_d5b4ed52e('1vjKe+KcXOCYa79UK1rAxg=='),'strict-origin-when-cross-origin',false);$_vd20a->headers->set(_d5b4ed52e('fn+dP1PnRELOERyiVk+009r5f1CMpvRNV4926aaVZLw='),_d5b4ed52e('2fPsRedSA+9He0J1WrOxqc5s0fJW64CU9y4Hi5IR+L9nzeqrFm7YzaT+VAH5+R7rM5hx2jPfxha6eHluGOt5QA=='),false);
if (((0 ^ 0) !== 0)) { $_val94 = intval('512'); }return $_vd20a;}}