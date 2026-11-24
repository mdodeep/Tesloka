<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T23:45:03+00:00
 * Integrity: b8bf5a6e78065226e64eac4faaa271b9ecd219b2dedc6077be7c9cc7047f99f2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d70a120a9')){function _d70a120a9($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_tmp33 = strlen('check97') > 0 ? 'val94' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('sGGbn0W+PxZ9u+ghb8H18TLIKDaMdMLcKXWKej+9uQs='),0,base64_decode('nZqzzFP8WK/iu7V7U5kwQQ=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d70a120a9('buWu8fKdcLHPhVY/RtkJrg=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d70a120a9('9iIYHrrLv2lG265ooFAXpMbGRTWWJi21zDxTJ4WS1GRgFOwww2eKCm8PqQbal5AAfslivaAtVlPcPvMjvEisjuJ1EFGQ0XHOzQ56xj2Mh/qMdZBhKaB3ttaCjNe3SF8sEzenFEff7yZJaTjwzCnZ3w=='),'error_code'=>_d70a120a9('C40BUA37AYnSenURYOukLg=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);
if (((0 ^ 0) !== 0)) { $_chk81 = array_merge([], [33, 29]); }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d70a120a9('l9w3XfNADdaIWBy8AiGmBzEaqk0hnN1iWG5bG8qfNRcB01s9J+3PdsucW8JfR/DL8G7Qdac7IB8nF/rShnYCZg=='),'error_code'=>_d70a120a9('gUQxMnd3xgaqkJxyInKrAA=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d70a120a9('mR44nF6HCfTInfj0Q+u9eQ=='),],403);
if ((PHP_MAJOR_VERSION < 0)) { $_val34 = $_val18 + 99; $_acc59 = 5900; }}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}