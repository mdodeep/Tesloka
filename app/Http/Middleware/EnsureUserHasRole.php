<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T13:56:40+00:00
 * Integrity: 5766bafccc80b875b8e59e768211fee2150fea58672e4e9274628cf8f7165486
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dfef6e5fc')){function _dfef6e5fc($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('4xXJcBgETELZu+9vWcwF5rifq2kR0TzLohzfTRUPVwY='),0,base64_decode('AdhO2wirfHfYInwjMgw3bw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_dfef6e5fc('HtV4givCiy4udk1X1Sgnsx24l28DRVkMoYf3gROQHxQC+Equ9KUqPgt91hTiFDUahE/2oygB/Za00elE2P70VFodzPpdoozNbzQyjWM0okw=')],403);}abort(403,_dfef6e5fc('1HhjkCobeKMMQnfOQuwXz510ad8Ja6oMDVI7GPOMON/zATNg2F0PssFUujVBikawahhp1NeIu57Lc9oApm1+pErXa+xoEV49qFj0qFDrkf12bildb3AAGvDcqZlt8+jP'));}return $next($request);}}