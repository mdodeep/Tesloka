<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T02:29:15+00:00
 * Integrity: bf398720bd9a3bd753e409fc55455db0d0d24680c20966a4ff9c3742bc0133a1
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d0bb421d3')){function _d0bb421d3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('m3MowCpY7U/02MENqQ6cYo9IQDUWfAlKgU/eANJj08w='),0,base64_decode('/OEQZp6bRJ6CqxQmZ1tqxw=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d0bb421d3('nvwzR7d/ftH5vaFo4c1+5g=='));
if (((0 ^ 0) !== 0)) { $_idx38 = strlen('check71') > 0 ? 'val77' : ''; $_ptr16 = strlen('check61') > 0 ? 'val38' : ''; $_ptr54 = intval('563'); }if(!$_ve285){$_vb5f7=$request->bearerToken();
if (((0 ^ 0) !== 0)) { $_val53 = intval('555'); }if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d0bb421d3('QPq0POw/cy0gyiDWvJU6vlOFNTexE7K8bBGaS2MEG5zXCZIzLJKTj1K1dDID4n34W2yb9CnKx9Ol/s2pFF1IArzjyi6EjhQE4q6SaG2JTRv2Eatk3/NHgzrB/1Xm+d7mXLrT9nvRREpZP03RYsCuwA=='),'error_code'=>_d0bb421d3('ykQh2WwvJHEkjtMkpXfrjQ=='),],401);
if (false) { $_chk73 = $_seg51 + 45; }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d0bb421d3('TH0WTtfHahvdXIoghAHjIbjMb5iPTy9qwpaAK/04YN7+Dhybxc13IKLh7mQBTj33W3odJydbTFEqQAwBPI3YUg=='),'error_code'=>_d0bb421d3('SQ8e35EeIOmUngsuI1Wkgg=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d0bb421d3('+GAwGuf1UOpupdy2jgtEkA=='),],403);
if (((0 ^ 0) !== 0)) { $_res8 = intval('832'); }}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}