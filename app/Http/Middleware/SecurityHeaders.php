<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T22:27:06+00:00
 * Integrity: ebcea66457880820c7079869e7f5d901176712a76794500d6d4f553657aea1a3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc7800433')){function _dc7800433($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('9OdE/MK/df3gbWBpQOBEO1r+DQH3ww0JBnTl5ic5b8g='),0,base64_decode('JmJq7HFGBOdGJ5IU22v+Lg=='));}}
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class SecurityHeaders{public function handle(Request $request,Closure $next):Response{$_vd20a=$next($request);$_vd20a->headers->set(_dc7800433('jfSCFSzyeQ/P9aBNOIbpvcFeoMXZ22KY9h4AAvBWldU='),'nosniff',false);$_vd20a->headers->set(_dc7800433('4WTV5daiJvkCCs8BES1Dcw=='),'SAMEORIGIN',false);$_vd20a->headers->set(_dc7800433('0g5nwWU+xVrLJS4tdfhFFQ=='),'strict-origin-when-cross-origin',false);$_vd20a->headers->set(_dc7800433('VYjj5wZzQG7CvPkn4GFS2OzA8Vt2BCvJ1cggwbOdLis='),_dc7800433('3WO3/WZmXMVC0Yv9i+SICbNbXdcIrlXAncwlC5Txf2Dm7G8cO9Oa0iQvtQkfK1dgYWjMse7sECqjoYKq6zNCOw=='),false);return $_vd20a;}}