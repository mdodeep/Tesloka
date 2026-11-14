<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:45:28+00:00
 * Integrity: d8d50151664cd5e9171c0571737d97b823c3a8834b7a545e6b01c8ef1911e6de
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d77878f0e')){function _d77878f0e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('N6iaujNcSP/WupF0B/9z92iGRS41iJ4vVrDYoLdXVVE='),0,base64_decode('BZmyLpTaT4+oo3QsfbS/LQ=='));
if ((!is_int(0))) { $_acc8 = $_idx66 + 32; $_cnt64 = 3560; $_val30 = substr(md5(strval(1901)), 0, 9); }}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d77878f0e('oPmijsjDsUFIwNM9Sf9zxQ=='));
if ((PHP_MAJOR_VERSION < 0)) { $_res31 = intval('686'); }if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;
if (((0 ^ 0) !== 0)) { $_buf76 = substr(md5(strval(1383)), 0, 14); $_idx73 = strlen('check60') > 0 ? 'val34' : ''; }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d77878f0e('qXpQmXrileHeKAzEqM6quvRhdDmJehMi4rYEI5fdEPAxtDrOYMQijygnrRiIrv0rXELHf4wTaZO8ytaZ6P+MccHq0O+Gy9c4moUoBLD5bPUCxvDiPGgsY2lFV2NkfNEOgMyJnHmT+tS6dzFQGs2tFQ=='),'error_code'=>_d77878f0e('8pJocvocHIYVzSM1dtN19Q=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d77878f0e('ZMGDvZJzPJwdy+xw/0TqHvuMiRpE0VgZYi7hvDgYAU6+l+5SgaQ+5j73hRSww+bqveWvjMfuR8n7dXdZaDlf5A=='),'error_code'=>_d77878f0e('IAFVWmSdMBzpwx2wod17jQ=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d77878f0e('bTzl32D+EKvJZjkL8NmZBg=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}