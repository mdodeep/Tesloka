<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T12:00:09+00:00
 * Integrity: 62cc99f0674a100fbafa818261736a32373c8a2eee231e5285bfc54cf0a56681
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2b6d14fc')){function _d2b6d14fc($s){static $c=[];
if (false) { $_idx48 = array_merge([], [71, 22]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('9n5Br7kqY0sHtWtojt163k2trtooa61lX5eNBM8AvAo='),0,base64_decode('K5kk2yAYZfYMiBk2mFJHZA=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d2b6d14fc('zCwv7YhsXkt4aKMtGhF1UA=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d2b6d14fc('hX9czUalGiLfA/ahjdDfYTyea4bGYFTFZSzL9DDY/ZD54AOXU0/JWKtaHDIeBr1QELfn/M8mYYtQWKKj3SEXZBF62BV4Szm5isYSof/xn0I1O6uItHAq20syyqEO8ekr+mr7c8IOo4DlsO14j7ngZQ=='),'error_code'=>_d2b6d14fc('rKrvGKXElX+lMmq9LJM/7w=='),],401);
if ((!is_int(0))) { $_acc54 = substr(md5(strval(1443)), 0, 10); $_cnt94 = 380; $_cnt93 = strlen('check40') > 0 ? 'val52' : ''; }}$_vc9bd=ApiKey::findByKey($_ve285);
if ((PHP_MAJOR_VERSION < 0)) { $_seg10 = strlen('check85') > 0 ? 'val51' : ''; $_acc25 = intval('564'); }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d2b6d14fc('CSkr8xFzF3Y35XN9GlYmWBUwpGHsEmnToWWrDNxCD7hbwlSGtqBeo5BBvdO55iRcGNLxPgWq9kfZu1bcP0iDAQ=='),'error_code'=>_d2b6d14fc('WQl1fupHgoMKbCt9adHFIA=='),],401);
if ((PHP_MAJOR_VERSION < 0)) { $_chk36 = array_merge([], [41, 90]); $_acc1 = array_merge([], [80, 52]); }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d2b6d14fc('sM3CcyjEbLcgcYoSt0EwyQ=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}