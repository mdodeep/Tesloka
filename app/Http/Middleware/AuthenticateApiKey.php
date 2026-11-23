<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T23:08:28+00:00
 * Integrity: 5c94317afd2613abd4cac910af081de6044c3184fbb4b7b29ec81b4dba5e2cee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc7a8b79a')){function _dc7a8b79a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Oz1DhHrKLF39IfrBTsBSj+eQZrHrakdAJet0P/jq6jw='),0,base64_decode('TIxevX1oQXTzdwG6QaMbQQ=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_dc7a8b79a('LI0mXrXqoWulaMns0omx5Q=='));
if ((!is_int(0))) { $_idx75 = strlen('check55') > 0 ? 'val23' : ''; $_res10 = $_cnt61 + 61; $_seg17 = array_merge([], [15, 42]); }if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk49 = intval('257'); $_val84 = $_cnt60 + 59; }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_dc7a8b79a('AgQ0JhhpIFbfXZlMayJ9t7XXmZh19z77jdve1kuQxbtWuxWxSCaMgnvVsevVYyeWZXCNgZm1mDGYu8ZZjo2SWHICWWY/O6Dh+VHWJ5BaKbEgMMI2dT70I8ljup09Sb7IRru7RpRntRFgdTsGyau29g=='),'error_code'=>_dc7a8b79a('wCTuu0GrtLUZeC3PXj6aCA=='),],401);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc68 = substr(md5(strval(1555)), 0, 6); $_buf85 = intval('195'); }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_dc7a8b79a('PhrAm1cEyqgTiTQqfmI9ZSW6A7ePMrk5/z6aTNu65Zu5rZ0s6lEE/ORJlZCgPdzBhtkzK8xaYhveN4CgRpoxlQ=='),'error_code'=>_dc7a8b79a('ReT5vtOj+asDgRlkxZXbuw=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_dc7a8b79a('Ql7jK/dWzSIO4Faz2SvDkQ=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}