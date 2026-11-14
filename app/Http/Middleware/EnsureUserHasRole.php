<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:26:08+00:00
 * Integrity: 36c9a2f4caea85b0d9be3587e3b699cbbb3fd8478edd5758bd9423d7d268d032
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d33c9236c')){function _d33c9236c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('sSJRYH1s6P8jmVF3omDt0+tvrruK/iWxELWMznMdAeQ='),0,base64_decode('d+7n/SOk9G2gy6eAt7rPGA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d33c9236c('RIraS4aLpL0c0Wf10yZZUn2DPHKRBJ2bKLFfFluyLGuKodcFjNj26FYb9pJcCfzfPaLAzOwCck/iW5+61EU/03jgfx2on+9ZaOeif+eIpIg=')],403);}abort(403,_d33c9236c('T9w3RjXAhHh9gJp0ok0V7pkJLAPIye9NQWG2Mp2LaJCt5FUH2XclFr7Ae17mfZfudfsrM4QXXFf8pUVoYYF1pG2RXb9atvgZoqZQSObmcfdKao+8o3vj2x6/PkO7bMQ2'));}return $next($request);}}