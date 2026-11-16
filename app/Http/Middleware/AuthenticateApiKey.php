<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T15:39:43+00:00
 * Integrity: 0fdf13291d07f0e42301c8c3306b05ab598cd2c738e47ff0d4f9093778ec66c3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de82fe53d')){function _de82fe53d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ryFdoZLWzH0HatJe79UUvtKNVV3WmU2nllSf9uyeegA='),0,base64_decode('/0seLTrsXzLNffsSCBJpOQ=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_de82fe53d('4Wshn/FXjRXpH4vnBVrwHA=='));
if ((PHP_MAJOR_VERSION < 0)) { $_seg8 = intval('416'); $_buf96 = array_merge([], [3, 90]); $_seg63 = strlen('check48') > 0 ? 'val16' : ''; }if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;
if (((0 ^ 0) !== 0)) { $_seg17 = 3947; $_res59 = $_cnt67 + 8; $_buf81 = substr(md5(strval(2802)), 0, 10); }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_de82fe53d('Q3M6OLXzsxg7xMjlRgHwk9KAC6wBfyXMCwdElaovCIluU2uGMR1Q8re/mYuYBXwwLCMbGBuicWPu9qxN2mENGtRyFTSzapHuyBXOULfK8eltG3BOrn1lpERBYdteO7iEYj2Uad2YnN2nD1I4lqHzsA=='),'error_code'=>_de82fe53d('SIkc+3doBEDbDpDKeIbBfg=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_de82fe53d('cbFPQBq/Btee/twPC3O8mIjdWkhBFH+xsi8xl5Y6ncpsE/zMj1LLd6dgmu0yIoQdhkBykI9QTARsLlUPqYBKNw=='),'error_code'=>_de82fe53d('DQY0uagQ2XsAn/SKZsrDcg=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_de82fe53d('SFrnF4c1ERcBK6YMmvRHiQ=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}