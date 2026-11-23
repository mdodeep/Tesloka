<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T03:05:06+00:00
 * Integrity: 16904cd816c3c21956ec405fb921e49fb870ec1c25916fdd9d72495d85d174fe
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d59bede13')){function _d59bede13($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_val91 = strlen('check9') > 0 ? 'val85' : ''; $_res40 = array_merge([], [37, 32]); $_seg32 = substr(md5(strval(2156)), 0, 8); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('vkxmRYhC9pHNk8kpLToPiC3W99F1Ea42Eq25ysWW09A='),0,base64_decode('8IghZ0xFcJdwnPTb850BXg=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d59bede13('EF76wy26qE/U6mxYQefogQ=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d59bede13('siZhFwSmjyVjWfOy2iTPS/NV3I/Hua6Ck9P7SfOTfx43bURYImWqvMta9ios/LaxxPdncmlLixL0A+j+8BA+exYv34viHtDWA2p6zpSmSdxl6umEsDMTtxvL42D+0qR3oadYOTdjPme/uAhM+gP3tg=='),'error_code'=>_d59bede13('Vt2rbCG/OY8OOjHjM4AHzg=='),],401);
if ((!is_int(0))) { $_tmp81 = 1141; $_idx34 = $_buf87 + 82; }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d59bede13('PWdObFbftWgkizOosDOTLAaERAxLqA/+fDAdWEgT2Wt+KmkJt2QmUeKDA1y/6lBkWLJlmQJAkhWxcN1xwnVe6g=='),'error_code'=>_d59bede13('r6/kp6TakBQlAG7SfCaBQA=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d59bede13('Jz/qEovwxt7cAKMNtUo5lQ=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}