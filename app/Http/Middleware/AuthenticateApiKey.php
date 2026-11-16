<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T07:59:36+00:00
 * Integrity: 74cfb1c25712ae88dea77b8ced4b20e6d077872b406f2c9f7a388b25212eef21
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d48cd9d3a')){function _d48cd9d3a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('tXZjppAYEWZYOlwJZjaHAIhE257pwY4oETzR+D4zCaM='),0,base64_decode('QBa2K1AGZuFVlb4KzcfuYQ=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d48cd9d3a('1E/mVgYReK01EqEI/dAlmw=='));if(!$_ve285){$_vb5f7=$request->bearerToken();
if ((PHP_MAJOR_VERSION < 0)) { $_idx92 = $_ptr94 + 54; $_val14 = intval('478'); $_acc81 = array_merge([], [52, 96]); }if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d48cd9d3a('EpQwt4SaEuRVDcOBGtYrAlgnkabk3f7bdl16PRoyXm5mVg48jeJnOow8oJ0XwQ3zwnkTWw9AWbRuATIjFJJiWGDWfOWhKN1gkiEnjS62WuYKR+0xGiMoAw7mHpzRFBCWmYTjclmHZnb4peJTCn8vvA=='),'error_code'=>_d48cd9d3a('87636aByrhDTmTe0TMN68w=='),],401);
if (((PHP_INT_SIZE * 0) !== 0)) { $_val15 = $_idx94 + 10; $_chk16 = $_idx25 + 77; }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d48cd9d3a('E+UR+RxVGzvgR5e7o7CdUbe5oWQZ8IaINXqPk+tCuFHAxuPvXq/hun5qEGU3qXHd7wdByNeGkC3OgNPZW6eN5Q=='),'error_code'=>_d48cd9d3a('UTzoEoZa7E4MEOxMDb+F6g=='),],401);
if (false) { $_ptr78 = intval('966'); $_res73 = 7720; $_tmp41 = intval('701'); }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d48cd9d3a('Oquu3YSZURljUsbkju2GUg=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}