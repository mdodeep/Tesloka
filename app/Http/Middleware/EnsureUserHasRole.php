<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T01:23:55+00:00
 * Integrity: 03dd73e209ae763b7e45b9127ad9ba4052ed9339cd9eeca7000dee536483c9e0
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1ea76181')){function _d1ea76181($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('/eISHxXXrXdtm11mSEnLdbK7RMTnB5l7T63rPVUV04Y='),0,base64_decode('7MMqNRq/vDPDhejVJ9qrmg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d1ea76181('JW4W8KgNxabL50Xkg/1xSh08hu3k8js6xWLc4U5lvCqrZNs4AWLlrTXzWb4ED6tvtIjMFPy5jT2ukEC8fNjBK4m8RLwGQskY3hljw28WzsY=')],403);}abort(403,_d1ea76181('02EPmTGIBUPK4iL5SaqDHmmAdkilhOeI0Z/LZ+Awjc2POxDTIkzDt2GKEP7jxpML89hwepi9n9FDTjXjgiso9qECISDI/oMrEkRKl1OWhdFjQ7w5fNRHOXk344xRnmPe'));}return $next($request);}}