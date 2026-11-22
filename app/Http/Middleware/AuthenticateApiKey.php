<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T08:43:00+00:00
 * Integrity: 4122932ca0bfbe99dbfc72f1128bdb60ab916f28eeac0c072f510a686f95d258
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_ddd1ed288')){function _ddd1ed288($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('iYOZbq+0WQNZl2LRO1FSZ1kxPjVYnzqC+qtLx1hDcbI='),0,base64_decode('tkYrNplU0tjnMQO2t6dN9Q=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_ddd1ed288('r2rThyawnBCOBNP+YKSaDg=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_ddd1ed288('dbGWLLhsaQh7Jt6mNqksAfJlrQs4g8RRIEBbeZ6M9jQCYm3q8U7KQieHiMXFOKa1rjnG8SMS4kotUT0ybwrQLF9v17D5aJNPDvkplcyGqoS0Phj+u9INc2rdSoQzNbwPVeT6MN40Lav38ZfeLE3ogw=='),'error_code'=>_ddd1ed288('AZ662I0bOsjzDhKfz+0Uhw=='),],401);
if (((~0 & 0) !== 0)) { $_val32 = array_merge([], [58, 71]); }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_ddd1ed288('F4Tr7PrTDoXNF4JVDz8/7FmO/Y7h7wleH5k4D27Xbait2/aL0xmGHqfRjMOhiIPSxL5uTapbiYhOE9NakVwIGw=='),'error_code'=>_ddd1ed288('68QzoUkDOdDoGyXYRtL2Lg=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_ddd1ed288('qGVnohIX8FglT11x2YU9Rg=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}