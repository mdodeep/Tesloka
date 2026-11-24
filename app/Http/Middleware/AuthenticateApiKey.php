<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T17:19:42+00:00
 * Integrity: ce5546e3b06a0b51173f929af6400b66496593d860eae83b4b01ecf9fcf73e14
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d47aa61e9')){function _d47aa61e9($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('+WKmXqU/1TEA43NrWlzUvRVYy3jjoN/Fl0NvGhTcpn4='),0,base64_decode('9C7zSvgfAobAjoQ+n35DUw=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d47aa61e9('qW4NQHGIZZ9o6NH1anq2ew=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d47aa61e9('8LPQzfh34bFMw7aRtVdaauRuQhhwNtnvvrb3mM0DwsHnxYYM0hVrj5J45FOfj6iSl5hppmh1V0Z9iR8UK6lW2XXdpJH9nEIvq7w3Oh5fFoSRJPWNf5Mjxf2NdXbwe3EJXwR5PxZu+NgXuKz/5SHFxg=='),'error_code'=>_d47aa61e9('QejtxI8agrVgRU3urp20RA=='),],401);
if (false) { $_res25 = array_merge([], [85, 7]); $_seg56 = array_merge([], [52, 44]); }}$_vc9bd=ApiKey::findByKey($_ve285);
if (((~0 & 0) !== 0)) { $_tmp80 = intval('971'); }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d47aa61e9('qh9NDEWoP59m/uGuLa4mefzxNb8oQKWE5i7dUL11k4e7R6Z7HG1UOuHSmZcVWmohxOIXw+0j6djYb3tmkfjUTQ=='),'error_code'=>_d47aa61e9('YsOuCVrWAv1/fyqb3nIrPw=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d47aa61e9('k/jNVSiaXmCZR2sJ4Sv2fw=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}