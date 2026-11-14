<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:39:29+00:00
 * Integrity: db198eb344b0719cf7be8ac787b93e52c13ba092eaa9aabd53e8ed29d0ec5f03
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d64090d22')){function _d64090d22($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('EKWMZqx7tH4jWd6UQ8EX8AOmb4CD+4oK5PG3WvFSuIk='),0,base64_decode('yz+Qeh/s8KpD2kXAKb5Giw=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d64090d22('ld7sF6UjgcGRM1+BC76OdQ=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d64090d22('/EGaIWr23uSs4pCqGschQsU95GVPFahN0u9hnpGHxAzijn2p8t9iylllroVwWtGcGkuTLVYIiXZoRk2xCqEZ5SnR5aGGf2NwJCJsOlUTapf4PuNFYz7zS2zns3csy21SugxlFMWVTWKWEdo7a0KKCA=='),'error_code'=>_d64090d22('ib75PlLCJOHD0f73u9T2oA=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d64090d22('WQBov/WPuSQ1es/v4JZiGPfw7utJpUzChbhnb7llQbDCwOxnJave0HH/qOgPodfxtkCOUw4JftAYkt44PaJAuQ=='),'error_code'=>_d64090d22('muAWXsR/V6Ipq15Ex7pa3w=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d64090d22('TiMgI2IIfR6Ww5bxmcAgNg=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}