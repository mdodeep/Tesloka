<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:02:59+00:00
 * Integrity: 4edd3c90534f55b33f572aa5269c8814b50e3f7edbc23e0daa0329b9f63e51ee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df32c5a60')){function _df32c5a60($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('uGvpoilIJ4y5tyeVz7t5Qe8QLveTajKwoBx+ZoCIsCo='),0,base64_decode('nCfu84uGmQGKwJi9g/RUtw=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_df32c5a60('0Dcu5u4J1s7RbesIXWmytg=='));
if (((~0 & 0) !== 0)) { $_tmp95 = array_merge([], [67, 57]); }if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_df32c5a60('We6C2G2f3FsUHvMWjbV+Sx4sEh9F0gQOfgw9J8E+HpeQqzz2QJhgCNUWlo9ISQ6TIiZ6B6mVqqI57PqzQXaMQ5Do6PEydsKe5FqqskscCJelB4eeKN1chf0DMc5z49a9BnQrx1aPAlRP9ZNtDoFVfg=='),'error_code'=>_df32c5a60('B6dJeL/TaDNTri+HhOT5ZQ=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_df32c5a60('vAycE7fMk7g0nK/pYYQxD1R/3nWiCJ8gGPKsFbMpAVMgj1q7YmuOU/4ZvnrsY382aZTeH0Dw2e5cudCF3FIlsQ=='),'error_code'=>_df32c5a60('VPqmfXotag1tL0u583iaTA=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_df32c5a60('xcMO1V+4g11kW613pRFbTA=='),],403);
if (false) { $_chk52 = 4705; }}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}