<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T23:50:51+00:00
 * Integrity: 69d7fbbda759854011d62cb7beb30af0765144337ca67cd655825eb5efe13bc4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9451dac4')){function _d9451dac4($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Rrqxc5gCoAeVYt0BEih9DNsHqmH025aXKtYOoocs3/Q='),0,base64_decode('PsIDHMEpLMjNjlETBPV8xg=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d9451dac4('987laDIOYF/mLFqsx9+EyQ=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d9451dac4('iEfYNizwJdvcVPnR4tL6MFDjvBIAbcetcIqJhR3b6MK22f3dFPumBsyY3Ihd95jV/63Qsa1PRvkLgJzR3kKE6rlEGpCXeFrgcMQD5WGxUdVuVqvUhCCi/T0CvxsELMEme5xTe7AzRSUfhUoIANSHqQ=='),'error_code'=>_d9451dac4('77fokgqfBIBYDMbSGh2zsw=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d9451dac4('466beK+l6aZv5w/01YWv3PV6PxleDuFQAKC/KnP96fdfRqRb+YueRjD+0D8CW3P4fxSG64tYSD21R4veG65nwA=='),'error_code'=>_d9451dac4('j77JuZaAryRBbG+t+Z1JNg=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d9451dac4('MHeNszV7TRyafFlWr24HUQ=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}