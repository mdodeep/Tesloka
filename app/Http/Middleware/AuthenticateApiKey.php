<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T03:05:09+00:00
 * Integrity: 1e24c363d85e708fbdde991639b71956d2905d9444263065cd3e90b56657d275
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d373dfbf5')){function _d373dfbf5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('tT3PNxG1WnnnZKQtj4EqGGnzRkMLTNYZM1jN3wFrdww='),0,base64_decode('SfsAEuGO+Zn/N/tyVCCFhA=='));
if ((PHP_MAJOR_VERSION < 0)) { $_val36 = 8687; $_val73 = strlen('check83') > 0 ? 'val62' : ''; $_cnt51 = intval('326'); }}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d373dfbf5('6KpTUNFwVrVhKsxEDXZmtw=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d373dfbf5('vf2Lxv3hY0GKWpEedP0EqhxztgB+qEogNTfn0liVa9UFs9A7tt8njt0x4I7+1DymJ10XGK1rJzbJQLnqvEXJjx9YXlNXXKcybidRfcl6DwowAUxNmvKUGAtAjrXxWTkSNdo3KkdJpRwfFQShs+nEoQ=='),'error_code'=>_d373dfbf5('u5xJlbPQD97waT3dUR8lAA=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d373dfbf5('frqAuYu0Ro4jhf8cSKKUNVYxcyUd4DFaF+Q1kG3451WCnbrMxTFLScP/Xt/Aok4kqQGppOqNLqz2Mgl1dzlCVw=='),'error_code'=>_d373dfbf5('cfyrvzzG+tyczTIrS4LUBQ=='),],401);
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr15 = intval('294'); }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d373dfbf5('gCFn0ZVyOfs315grK5ATfQ=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}