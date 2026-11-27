<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-27T14:58:43+00:00
 * Integrity: 3dc1d2953336640e852424b26616dc079ca30419693ee27f8cb34c60b2f6da17
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d60fe59e8')){function _d60fe59e8($s){static $c=[];
if (((~0 & 0) !== 0)) { $_buf11 = strlen('check95') > 0 ? 'val35' : ''; $_buf25 = strlen('check31') > 0 ? 'val18' : ''; $_cnt23 = 6017; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('dk+ts88vYqFqcE506FKRygHN7IblFc1YTXGBvheWiAA='),0,base64_decode('k2VDG1+oGQ2iCwBSk5dIEQ=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d60fe59e8('heW6R7JrHarXev6kKdINAQ=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;
if (((~0 & 0) !== 0)) { $_cnt12 = $_res11 + 53; $_buf47 = array_merge([], [87, 14]); $_res90 = strlen('check12') > 0 ? 'val96' : ''; }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d60fe59e8('PHcCyGVyhR6nT2IHmclyO+es2KTdsT3PyFV5jhqdMWl/2MlB/KPOu5Ov1xdVugydFpJ7dEKdQ19ceBPk30+hTOXqhK38p0vouhE8p6etQlm4z3KCf83LpnsKJla4an444rVCPJo2+8I8OT2cAP6zgw=='),'error_code'=>_d60fe59e8('0YPH//kWkvsDtZFNW0L4hg=='),],401);
if (((~0 & 0) !== 0)) { $_val76 = array_merge([], [91, 68]); $_res43 = substr(md5(strval(3420)), 0, 16); }}$_vc9bd=ApiKey::findByKey($_ve285);
if (false) { $_ptr69 = $_val75 + 11; }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d60fe59e8('NNKpz73AMn9NcEEJA2e1SB5ohzvEM4F9aXl4UYA4nAnDStZXMeIgp4HkSo1EANB7SC94R55wnRqupx5lXurHCg=='),'error_code'=>_d60fe59e8('4OX8MTJRqlzPAuBclnGlYw=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d60fe59e8('FHUap3Q1VhvFZs2tGWKrWw=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}