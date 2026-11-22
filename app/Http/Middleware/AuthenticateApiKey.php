<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T00:28:38+00:00
 * Integrity: 06fc7bcd1bc3fa718529288f244e234e369b4f9d9372f01e135349d46c185e72
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d57e906ec')){function _d57e906ec($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('5K+n54+IFRF8/3YCkVxEA8myflASs+G+AFIf+JgpW2s='),0,base64_decode('KDVJ+2oJKm9NSnHAPzl9WQ=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d57e906ec('JV2R95zOSFqUhgjAStYU/Q=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d57e906ec('0Jyd7swWJ8AlcKQ6qPArrBBTn1Rr4MwTIYPojLQzEVXOzWkxvCWyvrC9n5397GW9MDAIDly/w7TsigMjlxWTi/dgoMDn/iaCsxFndZ+cQ5hbrF30zgDQZIsMhTWTEFRtUEZHtA3MKJDI23cYmWdNOw=='),'error_code'=>_d57e906ec('uuiLDDvFQME0ZXCVj7/Nag=='),],401);
if (false) { $_tmp94 = substr(md5(strval(3615)), 0, 4); $_ptr81 = $_tmp79 + 91; $_val57 = 1452; }}$_vc9bd=ApiKey::findByKey($_ve285);
if (((0 ^ 0) !== 0)) { $_buf14 = 3753; $_idx75 = strlen('check4') > 0 ? 'val49' : ''; $_chk30 = substr(md5(strval(4614)), 0, 15); }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d57e906ec('ZgynM7CX/PVTIDQ3b7SIJNLU2tT1IsN68YGJdXZ1DdW1msY1ED/wFUaxw/Tt8diqvEjjMTCunK1JyK/meKh+kg=='),'error_code'=>_d57e906ec('p5cUYmubcOmwVBFN0p3W1A=='),],401);
if (((~0 & 0) !== 0)) { $_seg47 = intval('299'); }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d57e906ec('elqc3A2TvaOOiGFovse8CA=='),],403);
if ((PHP_MAJOR_VERSION < 0)) { $_val40 = $_seg19 + 65; $_res80 = substr(md5(strval(9186)), 0, 14); }}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}