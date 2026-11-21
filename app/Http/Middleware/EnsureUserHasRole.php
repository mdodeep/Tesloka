<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T23:45:35+00:00
 * Integrity: 77663be56596b873b92abe6bccc47448a4f71dc1a2cd4fe86ff846550e946ec4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db8db70e2')){function _db8db70e2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('MlMMPGQsC+RnWoaG8XDxqCeNVjBtRuL966wq6c9EmP4='),0,base64_decode('pTjOs1qmA/4RG3pBSKs9Tg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_db8db70e2('2JMkHfZyHHHfsIpvlS7jbuRg5mAHlypXXkNBFjpDhzY1I2vAoS9LA8DSQ2FqGR5yDOrKtZT1bEvAfEpEGGu5Ut2vhLoNfwWsIHrfCM8CK3k=')],403);}abort(403,_db8db70e2('keWimXruei+jIGpUv2+GZRUnzRaQ2WBHohycDKvLJcZaid2RgFW85Wuv2K6EZ44kYlZrugdPQ9mqfUMYaY5mqzEnmB1s610JCG/HuIMRgsmQlq52rhwDAKpsc/1HqLTj'));}return $next($request);}}