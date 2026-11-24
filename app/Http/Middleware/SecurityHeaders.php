<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T15:01:07+00:00
 * Integrity: 732d13c17bea258201492d7d488181ebc396461ab0f6b9e4f8436f39a34f93ee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dcdb19a52')){function _dcdb19a52($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('2zEI2Znp2yXBRHdekFAVmT+qzC7FW1TJAQm3yWN9NvM='),0,base64_decode('TnpK2epY2ZeQyV7/3Xh8bg=='));
if (false) { $_acc54 = 1969; $_cnt93 = $_ptr75 + 73; $_acc3 = array_merge([], [14, 38]); }}}
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class SecurityHeaders{public function handle(Request $request,Closure $next):Response{$_vd20a=$next($request);$_vd20a->headers->set(_dcdb19a52('ZdhJOuxU3v5XyZ4A6YyzpoyO0+1hXDrjyjpn0wQPLCI='),'nosniff',false);$_vd20a->headers->set(_dcdb19a52('HgR99axeFtXPhMNwGkdTHA=='),'SAMEORIGIN',false);$_vd20a->headers->set(_dcdb19a52('rNLqmHSG8pza+j3sqg8D/w=='),'strict-origin-when-cross-origin',false);$_vd20a->headers->set(_dcdb19a52('sy0TDfxiyV/wC49NKJURINxwkmhBcwMgisVbwNhM0Zw='),_dcdb19a52('q5uCyX5w4XoOiaYxJtgsYneEnbHWxg60ceF2Bo/uCU9SVz52VncCBRgWX9RKwgslq8HH7VRtTDQ1eY29clpw8Q=='),false);return $_vd20a;}}