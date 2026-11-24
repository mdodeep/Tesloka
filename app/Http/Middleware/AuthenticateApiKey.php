<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T00:08:20+00:00
 * Integrity: 7e97075b0c1d11d33345a82032b32d9a6731eec33cb5702f74d22d41762357b3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de1f482a2')){function _de1f482a2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('/PL+tWt7x/T/KbjDruUD00/b+97oSCPDndnObjHocRs='),0,base64_decode('6Gaemzt9v7JyQ639QZmp/g=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_de1f482a2('BCCrEjZwm2am+jaavecRNQ=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_de1f482a2('QD5i1Dy69oKR3AQN5iBV8hC/Mmoxqfw6zyHrc51N/5oeSbDAdSGudOnTD6oIK0CLdnYfF5p3M0NSrFXfyze5N77EFHpRp/lNRgIgTFdbOgQmCVvAmGL5drD/DFsOVxzl3rKJOfKhZ0mMr1ctnjPsrQ=='),'error_code'=>_de1f482a2('MwnWVrejn1cj7nDYCNw0Lg=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_de1f482a2('v3exXFvThlAwVgn2u3QXicjmZmaAsvwxpMwXN/AurdLMKrkmEBlCAXFCEfeEFWgvvqKi8d0ea50+a8VGKoNj2g=='),'error_code'=>_de1f482a2('HchfyhJohYekIDBWNMdmNg=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_de1f482a2('/8QnjGZLDnArE94cDuY5Vg=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}