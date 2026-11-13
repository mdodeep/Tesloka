<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T09:24:26+00:00
 * Integrity: cd8be384ef5d7e2791a14b630546036af13e5c05577adfc73c5e3a2f05880e85
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d4fec9ecd')){function _d4fec9ecd($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('i0E7i/+zabZUiTv7EjZRGqPZVq1dFsiKIjiZ2qzJbAU='),0,base64_decode('e++J99gwo1wfgx7ppqgT1w=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d4fec9ecd('0ar7ndl9Zxl5cEGIGkY3og=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d4fec9ecd('4cjoe65AwUpjt1vrpRkaZalsUIEIaHoodl/iuNTxdCYwM9xWjQi3lSOIgy/lev/XNDiJB3fytu64kFQZDDj0V8g6avzIidWey0vwHThyeigaN4+rfUWQColTN6eV5R/8KJhfbARUNW6w5RGvIflCcw=='),'error_code'=>_d4fec9ecd('laL5UPMcxCAaouU2xbvEhQ=='),],401);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr11 = strlen('check16') > 0 ? 'val44' : ''; $_acc45 = strlen('check93') > 0 ? 'val15' : ''; $_seg42 = strlen('check17') > 0 ? 'val67' : ''; }}$_vc9bd=ApiKey::findByKey($_ve285);
if ((!is_int(0))) { $_idx7 = intval('463'); $_cnt0 = intval('248'); $_val16 = intval('623'); }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d4fec9ecd('zEqJbWcEB9CQEQVjmrX52dFg86S3PjlehCjg6zsYsU+pFfnfW57AmP7NAYPEtWYPbd6oHORR4y2YI0nWQUhLOA=='),'error_code'=>_d4fec9ecd('BqwTCd9cTshDq0ah82phKw=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d4fec9ecd('eWotxwGPlzj+bXwunF9K1g=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}