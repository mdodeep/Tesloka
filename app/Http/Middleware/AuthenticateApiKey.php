<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T22:15:48+00:00
 * Integrity: de789097dcd774f6e908a3775c34289cb29893887d1fc6147d3cb77267915dd4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_def30344a')){function _def30344a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('wnJvlfxlDekDAIdQilFnbPWcqbx4x1aux0R9oAwqsaY='),0,base64_decode('MDksIrUS4oOTxDJ/unNi/g=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_def30344a('tj7CvxAQtmrwxI6rEjTyPw=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;
if (((~0 & 0) !== 0)) { $_buf73 = array_merge([], [6, 99]); }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_def30344a('eBIBYbjS8KrFjnvnNAmuZXHls3Fogliawf47cYZ+Q2lvZgCul5B0J6mfcjRY/EO+MCOe471wd+DNXj6Wgy7vipyiG3rpDdN/K337NaEDHzzVu8AX1SDfaJf5hOM7JBCt1ASrV5osrYYXoPetXNavPg=='),'error_code'=>_def30344a('Ww/zcFUDU8td2D8RUB213g=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg84 = $_ptr18 + 42; $_idx41 = substr(md5(strval(145)), 0, 4); $_seg39 = array_merge([], [47, 75]); }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_def30344a('CGcCwDuIgKRpdUDNF1DKPMLdrdiyPiUQrl0Sq9YuhCejN3f0xal0pXFmBNeAwtkk92z45bDsnOOCnwcHD0GCfQ=='),'error_code'=>_def30344a('+NMPHYL9UroHh9SrszfH2g=='),],401);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc26 = array_merge([], [76, 41]); $_cnt35 = strlen('check63') > 0 ? 'val28' : ''; $_cnt15 = strlen('check61') > 0 ? 'val30' : ''; }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_def30344a('QPtYiIyQQhyPBt8LpVc2Ug=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}