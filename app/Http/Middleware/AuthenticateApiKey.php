<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:40:28+00:00
 * Integrity: d8afa62270f139dce3d4ed0f9766ada15192a183d4abdb06565216c2901cb57a
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9bb73b23')){function _d9bb73b23($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_buf74 = substr(md5(strval(9567)), 0, 4); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('mH2u8sO1rVSd1RqjnvxKeEm+TavcXmVcrNVzqdSShCU='),0,base64_decode('cA4DTJ/3OR4U82++4ymNRA=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d9bb73b23('m54lcJpgZI+0jekiV9ZAwQ=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;
if ((PHP_MAJOR_VERSION < 0)) { $_res55 = 7813; $_ptr28 = array_merge([], [50, 32]); $_res59 = array_merge([], [50, 80]); }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d9bb73b23('FDpLPQRVv5ShQHjItEjdeuXRLNPci1BAC+3YqEWiHQ0Q5v2VSs63oSkIo2I/toj4k5qty3kqFm4wpzwjiUtg4sU51XrLM2zPSX3uYkHnIQWAWz8uxynGgSUO698tO7oWc4st8bhTW3U0pBfnlGn5WA=='),'error_code'=>_d9bb73b23('LtjSa/HWjriszcL2eAIPsQ=='),],401);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp46 = substr(md5(strval(651)), 0, 12); $_idx50 = 5513; $_val77 = array_merge([], [78, 55]); }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d9bb73b23('em+Q9qOpCezGUZgruf4QExA1IU3fccN96d8JxhsTrI5rOzJOZ/aT0/OTw4xJ88jD6vGIZOh4CgfkKT3p0cZmAw=='),'error_code'=>_d9bb73b23('PpqH1OU0TrzIcyO/Y6Lc7Q=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d9bb73b23('OyegXDjtz/WrCrwcr2wuUQ=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}