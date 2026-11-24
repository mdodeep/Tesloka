<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T00:08:20+00:00
 * Integrity: 7e97075b0c1d11d33345a82032b32d9a6731eec33cb5702f74d22d41762357b3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db7494e87')){function _db7494e87($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('YPyts6ySsD+QEInZ9CvTBqFdfsj6sBWI7yxc53u2XeM='),0,base64_decode('hA3rsGB3tZGtXXFOHLmG7w=='));}}
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class SecurityHeaders{public function handle(Request $request,Closure $next):Response{$_vd20a=$next($request);$_vd20a->headers->set(_db7494e87('lKxWfSX3KKecLo11edZk+WmGbt7ZCBTW5yNDISdoMFA='),'nosniff',false);$_vd20a->headers->set(_db7494e87('jYL/BispKBy4d4twru02ew=='),'SAMEORIGIN',false);$_vd20a->headers->set(_db7494e87('uXKZb6KgYpnHxriElPnqzQ=='),'strict-origin-when-cross-origin',false);$_vd20a->headers->set(_db7494e87('3BDJVsrgUy0CUFLBvNHN9HXrAxaAOJxdCP53T4P8FEs='),_db7494e87('fiaVU71qycqcbHxPndssy3i3s/t4HsP3GfsYPRZnhUy6dkh0qth1is7PxBg2JwUKFZnZb2HZlQvcMPyJJd+jwA=='),false);return $_vd20a;
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx74 = array_merge([], [67, 75]); }}}