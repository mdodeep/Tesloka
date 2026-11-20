<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T10:38:08+00:00
 * Integrity: e0a0fe45f10cedfd3d38986dcf8f696755325a946c7fff414a65b8f3292980ee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d36da171c')){function _d36da171c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('UubZo4nRxfK/xp07pRAHekWVHxnHo+gDFf9dzRMUP4U='),0,base64_decode('TlPEJUrjsu7th4tJO8fd/Q=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d36da171c('E3lecdeY7vKJAUKNzo0N+A=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d36da171c('yR1D0jwxgsctVHvZnyHOLsx/y8N+0tSZX2o7qusQYbQYBv/0QAhCIJE02w4fIj9AWXytFB8eUISFuG6omlLM9Uhx/n98wk4xlHLhsyHMRtX61JYuZ/620WbemNQg2sUlhA5uaufYuBP4Hf4aasw2Eg=='),'error_code'=>_d36da171c('hK4eqV5UPGEcxNsJJKXEgg=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d36da171c('7WgBwV+TmbZpi2bN2cJrrnX7WxGYBvisDyUgxZ/PFmBrRhSsiPZKAu36G1pgQPR8rrYd7zCn70k8jMjA0KXKjw=='),'error_code'=>_d36da171c('Ek4BYdW5pLiq/tHWdoLpjg=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d36da171c('WJiKNWNm4oryRFh2MUgSGw=='),],403);
if ((PHP_MAJOR_VERSION < 0)) { $_res37 = intval('81'); $_ptr8 = intval('673'); $_chk27 = intval('504'); }}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}