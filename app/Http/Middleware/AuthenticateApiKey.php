<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T04:11:59+00:00
 * Integrity: 7690f1e7540315beac41f13c216f5d848301a24c92c0faff9be9ed433c6f1790
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d52b383dc')){function _d52b383dc($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('SuAUsSiQDQrvuV+mR9NgQf9eMvqcJxy7BUglwXw+AoY='),0,base64_decode('N+G6/HvYSjfXmSr4jj7zSA=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d52b383dc('iL/zbZ7c7WQLS6XRjzunpw=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d52b383dc('aeQcTWQsNVuQm4UB7aKVpgqTazdbxTZehjDVF6PWukBUYmIzQ1O//Cbgv7wv4Me6ZiLehnddfMVVFgbZA1LyI1z/Ng4i+DPtM0EO5Y3/EoRNTbLPVtB8e+zk5L9QAArDHfTRAvUj+/4FUkus0VPDfQ=='),'error_code'=>_d52b383dc('2bH4b5nfsQ2MpJe6U+8fbg=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d52b383dc('hHAWnKemnI/0TLmXiK9QT2npLQ7NZf6c5zpoyQhz919dpsNUnwkPtrPiptN2plDZFUzhUrRNYfxOjeBcZyxbWg=='),'error_code'=>_d52b383dc('YJK2hWRKdB+tQHdlIXAWiQ=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d52b383dc('z9XhrGrnI0m9ylRUcmO+hw=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}