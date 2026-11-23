<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T21:20:40+00:00
 * Integrity: af6d3acfb2e194b7af06fc05cdfb21508ed4daac2fc61ce37d8c71b27cfd6906
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7a5904c1')){function _d7a5904c1($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('p1ozwN/a4PlI+pYfDdK1UmRG5FtNRiYIgUTn+UpvkOg='),0,base64_decode('h8SpeV4z6oajAIqe0trFJg=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d7a5904c1('SNzULbVunqb6yTgD+fKqhA=='));
if (((~0 & 0) !== 0)) { $_res10 = array_merge([], [60, 6]); $_val32 = 706; $_tmp83 = substr(md5(strval(2222)), 0, 13); }if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d7a5904c1('nBbWo5C3KYLGVl9UUfqprS6XctJD7v83XtjTEkKzzGBk4euOEbll1EuXMCPMgANOCNkENd2glkCpxZp17TFI4r5iOGiV+bpmLNX1zRomJQff/BsQ5eNmQunf02/6lr8mX+6IWWUrS2ExjnPvi3xXRA=='),'error_code'=>_d7a5904c1('9qJ+ZAJDGgo6UCm1HK3fbg=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d7a5904c1('X5as9Ny/RxVpfaA8vyEfIi4aDS7g1HxweA30VoqvNrVvY21MkraVVUPmCU7zfmTql3Sm2/4NDIgiAZHnQj59Cw=='),'error_code'=>_d7a5904c1('s8swMrP9BhRSMV1rVqHcyQ=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d7a5904c1('5nnMlhxkrsGPl92ENOiazg=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}