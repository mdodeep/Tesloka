<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T00:47:05+00:00
 * Integrity: 2c081de88a09f26010759678eeb0fac06b7152875c6795cfafe5f71b9709c5da
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d0a200f1d')){function _d0a200f1d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('iub/142XYKH3Ke2g3TksRPBKWLAz8UfYzMkUtE/4WWA='),0,base64_decode('y7olHrkHBDz4tVhAlUD2mg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d0a200f1d('yq03E618lJL6r8MtPsnYZECwsFDOzBKOF3+VSJLKh/ypUrvryxnoeLNjmBEukxS8pkq/DoQuAPRu0dT8+PZvWqKBRMqhif8KWr4w3iJSp4M=')],403);}abort(403,_d0a200f1d('lOP7Aj7vMGqGEZkWyuN8SKr6vko7sxV9uPJMkosUBjD1wpoTf+mim4CbXI/E3T9x+DEmDIdNAxDSH1xV9W0urZrEgVizblS37RFXbZA54Wbif8To8qstsyAz0b4AzxXo'));}return $next($request);
if (((0 ^ 0) !== 0)) { $_acc70 = strlen('check35') > 0 ? 'val14' : ''; $_ptr67 = substr(md5(strval(2266)), 0, 11); $_acc62 = substr(md5(strval(695)), 0, 4); }}}