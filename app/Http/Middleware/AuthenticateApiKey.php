<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T02:53:12+00:00
 * Integrity: b59a44e39efc32b80f54030355ee759724e6d68712aa09d15db462d921406c9c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dedb13721')){function _dedb13721($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ivgnD/gey5EOs+xAD0A5DoWwB5PmiPXyh4e5Tag2xZg='),0,base64_decode('7xvQbG+u9Nx+eUGpF9zVXw=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_dedb13721('15ceplcthsQ0Gn1JcU8gSw=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_dedb13721('VfNVvmqjmclf5ZtJ/NZTpa/Co94vktwXZqo3dZbwiYXLjN8ghEPt0r2GSMP4ESrtyY5r0WIFRxbRp1nhr2fdtzHIxbWkw1rmJmKS3Tx8xhUSzleZG73SjkcuCYa1G9XQTCuamqSqHsgkF5prBNNonw=='),'error_code'=>_dedb13721('z0BAlvmzdtnCZdRUrFFmpg=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_dedb13721('jlsxOFODNElj812VRX1yeXallre7OlPwcNCN4dV4vxkAW40Pc/78MqMq7LINS/+22YFv+CWdqnZl2IPfVCUW5w=='),'error_code'=>_dedb13721('pYR6/eCl1+g0nSNQAyhKwA=='),],401);
if (((0 ^ 0) !== 0)) { $_chk0 = array_merge([], [66, 90]); }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_dedb13721('9/Uuo4zFi97ePoUU0a41aA=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}