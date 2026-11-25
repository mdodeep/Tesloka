<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:00:39+00:00
 * Integrity: 3bad3d4fa11dee0cfe1ada07762cbe00c63a79c37c90885345211f475742f7f8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dfeefa289')){function _dfeefa289($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('kZpmhQ9Na8AD94FpqGaJT+6qABQByEN0cHz8z3emXq4='),0,base64_decode('u+R2xi9rdHH4prhL5lHGSQ=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_dfeefa289('Vmr9mR/DXVJ9nsauHwmiqg=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;
if (((0 ^ 0) !== 0)) { $_ptr91 = substr(md5(strval(4440)), 0, 15); }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_dfeefa289('0Km+LxdDgUokbq1S565QSv97p3vKaw93hTnr3+RaqfI6IK3Q9Lp+tlIL8HrHPJ3tuSxCNsgzyglDbtAdII3UuL+a4/J4zRZaK1/MB/G4PZ4mMbVrSHP6JU6ooraTqqTlbE1SlX7wSiMn2IZ1wmB9Pw=='),'error_code'=>_dfeefa289('9XrqfRxWo4RDb9AN0G4K3A=='),],401);
if (((~0 & 0) !== 0)) { $_tmp51 = array_merge([], [80, 68]); $_cnt83 = substr(md5(strval(9635)), 0, 11); $_seg4 = intval('330'); }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_dfeefa289('FDiduLPYy9/ITvuoxmKa96eNi3RHCmjB9JaSQmB+NCQP27xx0GM5gEwNafHux1ikZAE3Q7E01F6+pY0NxssRLQ=='),'error_code'=>_dfeefa289('x5CLII022B+BjgCNGB4tKQ=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_dfeefa289('i5Tn20iPjdoa/rRGdU2hrQ=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}