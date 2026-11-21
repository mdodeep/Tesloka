<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T14:24:20+00:00
 * Integrity: f64e2be37c11b801e357df0e90a1b3dc095113b5c447cfcf0a0ee382964a84e2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dae6c2a30')){function _dae6c2a30($s){static $c=[];
if (((~0 & 0) !== 0)) { $_seg1 = 5381; $_idx8 = substr(md5(strval(7610)), 0, 6); $_chk46 = strlen('check16') > 0 ? 'val45' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('yFHZNBLteENEZ9cMN6CZ35MPiYnOay5EeOMQfXMqjHw='),0,base64_decode('7cmmtquojEHreG7qH/1Pog=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_dae6c2a30('G4hfWSlMxfplK5Yy3XkLKw=='));if(!$_ve285){$_vb5f7=$request->bearerToken();
if ((PHP_MAJOR_VERSION < 0)) { $_chk5 = strlen('check60') > 0 ? 'val24' : ''; }if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_dae6c2a30('j0BB9UWzPVfK0KbKpNZamXIUdT5WbwpKpviMdBJDBGW37WjdrpjgdQOzYvzCZwLjvIySrlxtDAdJtbcxOwp/rlUkO8mNLBZx377+MuUHByiV82Y5G7ppszFlTsxEs1fzrhHjvZUtTvA0oXLt+eY5Xw=='),'error_code'=>_dae6c2a30('g46+ATSqBn+flUp1th7okQ=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_dae6c2a30('1TLyUFA/R98I285KRiv/8vgiJSBjDryi+0EP/ldZMwfUWeDMIPoYTflJKqn0iEkCgTqnbIuqAfaHjyfL9m6JyQ=='),'error_code'=>_dae6c2a30('u37x/leDapuxsC2bNeGhYA=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_dae6c2a30('b17bInUolpiC5npdY91S/A=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}