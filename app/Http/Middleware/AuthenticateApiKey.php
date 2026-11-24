<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T14:53:14+00:00
 * Integrity: 179c6012d379ee653be11c384ab2747ffd20fdf270a218152104616ad00751a2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7cacb3d5')){function _d7cacb3d5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('76bHzZxh5OaLkKP+m+qjLkyKGjr8GhdZYh+Fy16+aqQ='),0,base64_decode('/OHiBmw2RVOAognc0q03+A=='));
if (((~0 & 0) !== 0)) { $_idx78 = intval('583'); }}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d7cacb3d5('FnzclOTOrBfgYc1SemW70A=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d7cacb3d5('VuTmit5vxirYdmbFW3tD2gOvgXO4wtgrbLJM9LtdfY0zTQbvWtI9EcAh/afj2/t0FEDUpSpXRN1m7tFeuaVv9WTlOlp/ofhFYHcFp6HM22cvxMYM5/z6TtYDqu9MgxHBqCcjHLyLAFYCsS5Au937sQ=='),'error_code'=>_d7cacb3d5('17tFBtqK8Br431U7usfMzw=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d7cacb3d5('126YV0UFFYLDzH4OLA0D7Rghg3+3oMPKrIT2CYVf8cDkiZc0MXtNFgLnCMDbE04rUoBIt6OR7MuufCMLQxHA3w=='),'error_code'=>_d7cacb3d5('Szggscs98Ju3LoY5zNxoXg=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d7cacb3d5('EQZhrQhTxRtiE525zUQjlA=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}