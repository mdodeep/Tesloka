<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T17:59:52+00:00
 * Integrity: 9df5056a5d0327a6d22531800b27a86c8ded9177e82f9d7bf52136d59d871c1e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9f6dd72a')){function _d9f6dd72a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('+s5YlszYWHL6M0CvkH/0ssT0YJsX84gV8GxEysIWowU='),0,base64_decode('MzQ2uq66F48Fv+n1rr2ABQ=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d9f6dd72a('W5J/dobrYazfSr8T0C1LKw=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d9f6dd72a('7OOI4Rhf6Z66MLF5fCSuC+U1iwDiHGYVYO4dKrth0xnrWmKCje3D0lDL2nm/HnBNT7TbI+QkiwHYkiMVa9PsdmV4EJp/NiwzOZ7A9mNaR48P+G36txRR2AhiqpPPKBnZRSHaTUzDTPB6Z/3epf/XQg=='),'error_code'=>_d9f6dd72a('xxp06Kg3AM18+k+Um2ICrQ=='),],401);
if (false) { $_chk79 = array_merge([], [17, 65]); $_idx23 = substr(md5(strval(3843)), 0, 16); }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d9f6dd72a('8KWyL/Fr8iDneyQ/iV+Slb8poyzzEIzBt9NaCgLsSbzhtWP/7iIcKhGiE1ogX1V7oim+3q6IqxdPxZI1rqGQlw=='),'error_code'=>_d9f6dd72a('YGA/wzaPncSBqnnL/xTwow=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d9f6dd72a('i/NkAC1Uz+WadOm+31EWlw=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}