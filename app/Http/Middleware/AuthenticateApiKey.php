<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T13:22:47+00:00
 * Integrity: 103d18971ce7736827021cff41c8eb2aba5d97fad58112dd804a3e04cca16207
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d18ce16f4')){function _d18ce16f4($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('i+CxFF8n4rfufcVoGIHg4+e2SLnl3GDTI6mkGsTmeMs='),0,base64_decode('ntF/tSL5O8rzaPylwKrdWA=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_res20 = array_merge([], [49, 89]); $_cnt64 = intval('686'); $_res39 = 8246; }}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d18ce16f4('LxvEZzLA+fK/W4YfvYVnHQ=='));if(!$_ve285){$_vb5f7=$request->bearerToken();
if (((0 ^ 0) !== 0)) { $_acc15 = $_buf34 + 24; $_chk4 = intval('608'); $_idx95 = intval('513'); }if($_vb5f7){$_ve285=$_vb5f7;
if (((PHP_INT_SIZE * 0) !== 0)) { $_val86 = intval('146'); $_val37 = substr(md5(strval(8214)), 0, 10); $_buf78 = intval('232'); }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d18ce16f4('m1uluiB2C7Nhp6Lbx3Dm8wWZzrL6J3ixbEVZZYGvjdwxLtcMxgAb3Gfm5KJWX9md/5Jat/WcJt3eDThQta0uN5ZvSvzRPXEagcQGR581Y+nlsWss+qE3z+OOB3MbQD/cxWipCwpajNcvSyfODDtEMg=='),'error_code'=>_d18ce16f4('cb8GnfGirCB8PGNyQPwAWQ=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d18ce16f4('cj4RiVjaS3K5KUclAqfKfvYKR6b4Yba0kRxh+cmEwIkyzlSmZWXhBkALcGidZ7rk0h0fnmxNgs2jJWp9uPNTDA=='),'error_code'=>_d18ce16f4('1NqvYXzbQ2zPE2RnYZ2cqw=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d18ce16f4('2veFwO7I+qkrhEjFddntzw=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}