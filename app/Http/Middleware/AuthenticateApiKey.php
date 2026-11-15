<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:28:09+00:00
 * Integrity: cece1f09a4c104ca687cd4df334946077335ee48ea708f4c43c98fb7ad43a1fa
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d8913a35c')){function _d8913a35c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('dQKls3j3iAuqp8Xlv4aXwxXw/nS/oqmXae0PSkUl1NQ='),0,base64_decode('ZhIG3xuQ1LPjjr4IGq5AkQ=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d8913a35c('6loQGbQuCK98TdQA+j176w=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;
if ((!is_int(0))) { $_buf55 = intval('737'); $_chk80 = array_merge([], [47, 37]); $_val19 = substr(md5(strval(2550)), 0, 13); }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d8913a35c('FQGE4vQjFdERU0gzEPTBQLn0N6fcui/33RW0LrMeDGCu+tNBWlgxk8lEliZGnNfK2ClBY8FX3M83G1opvDmKneQc5rO3oGWhc8SawDUVB3FGP13aGxs2l+CE0ckyLlXVe5mp0JIEOnl0vja6bafTEw=='),'error_code'=>_d8913a35c('2kBLYM4kXMe+gceQy+9w5w=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d8913a35c('Z3cn9yP9/p2WW3LkRXMdVtPYTzvtka1q2Bw4QrCcF4K76on3ykYuTfrsRQLMxFACoxTd2Xr4JqjYV/0InzGP5w=='),'error_code'=>_d8913a35c('yKBXHUMnVekXsHrsasPjZQ=='),],401);
if (false) { $_buf70 = $_chk43 + 29; $_res56 = array_merge([], [80, 52]); $_tmp21 = intval('524'); }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d8913a35c('jWt2DULwhrWEAIdksLlHXA=='),],403);
if (false) { $_acc27 = substr(md5(strval(907)), 0, 11); }}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}