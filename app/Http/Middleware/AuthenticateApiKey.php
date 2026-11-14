<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T00:14:22+00:00
 * Integrity: cba49dac84e23e46259554721a02318f0fec97670fbdd18307dcaddb2439029b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d824e28c7')){function _d824e28c7($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('/JNbaF6E9Jo9bBaoR6XTBV8aR/AeRtc62XpGHZeOE/c='),0,base64_decode('O+U9TJHVmBuzjsOWsyaMaQ=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d824e28c7('0zJIliqst5N54nNYHPz/aA=='));if(!$_ve285){$_vb5f7=$request->bearerToken();
if ((PHP_MAJOR_VERSION < 0)) { $_ptr49 = substr(md5(strval(7517)), 0, 13); $_chk13 = intval('43'); $_seg11 = array_merge([], [97, 95]); }if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d824e28c7('2b3Ml+rhipNsPe05WrSMjKKoS3h9/LGguQ3L4n7BxIhoSt1hlTLC3GfAlO6QY8Ax/1aIZB4eeq5AOpY5SvS4RdkhCxQ+h4m4iJZygEPlyQxk3E5xgR/x5NkU/dHlCYfw3hOc/2P/jSkJNywno5kxPg=='),'error_code'=>_d824e28c7('69AegzJhlUiT2lDTTBYA1g=='),],401);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp6 = strlen('check72') > 0 ? 'val17' : ''; $_buf29 = array_merge([], [47, 71]); $_val66 = substr(md5(strval(7511)), 0, 13); }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d824e28c7('LKD9TDZFX8zJ6YzLJjRdeHnfX2JYCLMShYd2ZygwEpwlZwY/iN5BZ/+ZVVQ7rcYmSV3k4jOXxCnXt/B+Xn0kCA=='),'error_code'=>_d824e28c7('1mglEJCKHQ/faQQ3rANvow=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d824e28c7('CW7fRR3LjWbRLz+/PKH4HQ=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}