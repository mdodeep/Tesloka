<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T08:25:42+00:00
 * Integrity: bdf411897d6e92d2c062c00df8c8159ae397421da420a7f909e77fb6460130be
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2302eb41')){function _d2302eb41($s){static $c=[];
if (false) { $_acc95 = substr(md5(strval(1287)), 0, 6); $_acc54 = $_seg10 + 31; $_seg8 = array_merge([], [34, 67]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('3TDtaVWWB45XwKGdX84/zhoYqL/hUH6mWy1B9Dmr2W4='),0,base64_decode('3XhoVSG7xeJvM0PCVfuqKQ=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d2302eb41('I9ChN5nXgAtVKsps+dVSPQ=='));if(!$_ve285){$_vb5f7=$request->bearerToken();
if (false) { $_val28 = substr(md5(strval(5439)), 0, 13); }if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d2302eb41('LOlMCaPSEpuuOtI34jbqU8SU/3slONlWK7/bm2P+UZ4ml4gunu9yCIfmVrBOpR12UpKblJuk2DFXVQ4Zl1GqCOlBSYhWxd6fL5ETAEc3Mw9eAfembCREVWSFi6q0IDw6Msa97ivx/j2iRfuLgRlb5g=='),'error_code'=>_d2302eb41('fO4J9lEztbpa5coNqYK4Jw=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt1 = $_cnt10 + 38; }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d2302eb41('qPBexZ8QebLfzothdkHdRePBbVGcZEWgM045I7yKIhgA7rHRpXxAmWp/vdYwoRHnRyiZ1p3udgH2hwEDxLAFtw=='),'error_code'=>_d2302eb41('KOvNXMSjykp/cG1SpeWgNw=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d2302eb41('ukAukzea/u3y2CkFRFhABQ=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}