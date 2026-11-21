<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:32:20+00:00
 * Integrity: 478a70a0514ca4b030cf683c5df8b15a4375318e1e3ca01055d8d807b786e642
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d0d820886')){function _d0d820886($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_res74 = strlen('check30') > 0 ? 'val42' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ksZS7a0TPI/9sxl6IuUXM+yELDaLXKJknYQkzjCy6V4='),0,base64_decode('1LdlPdN9DmsJIDB/yE6FOw=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d0d820886('onJizxHmHBPNCfj0TvSa6g=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk16 = intval('518'); $_val37 = $_acc51 + 41; $_idx28 = intval('766'); }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d0d820886('pLTDVGrp+km6MKb5YsQP9RGQZa7mWiWoA/udcHur+vDLoXaYgsalBcOYNI5IlvHPKn/z7yjxN6pS8DXAQpDXdohZ23uTOSYBQDK6Rlq7ws9I3T64F8hoZeGu2WyCo7BxECgLYxCKq1CIQ7mXFQxgOw=='),'error_code'=>_d0d820886('SEORRhl/dTDICv4MgQx7KQ=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d0d820886('oIq6KE9C6BW3PowKe5qsNam8SeGD9r9qiIEV9ML+NShEChYsWZlji4dJrUXD3QYXvv0K88Wtg0s4QzKgCjUpOQ=='),'error_code'=>_d0d820886('v5npeqxSetFjq/DDcQYqsw=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d0d820886('fN7THbrx0lOHQ+QjbQSMGg=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}