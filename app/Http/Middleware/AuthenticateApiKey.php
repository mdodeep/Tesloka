<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:48:00+00:00
 * Integrity: a5e866931b83edee49a3f71c95380253cad26acfef1decdf8da8558fd1c6d4ec
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de18700df')){function _de18700df($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('qIPAmY8/YLzgqaOn6hRI0e6/TLz2w5mqhW9OthuTfdc='),0,base64_decode('qH59ThyxzpsOW/UYEm6Ctw=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_de18700df('RgG5Je8fauxCSDCbbZhsUg=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;
if (((~0 & 0) !== 0)) { $_acc24 = strlen('check90') > 0 ? 'val3' : ''; $_cnt83 = 6846; }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_de18700df('1WElvQOyS4dJQ8n94v3BVKXbXKEWd6/v9Is/VjN2IBedGx7etORXemfQemOfFksaRbJ0jRYAeM5oyXan9LUwb0I4E32B4WIhLeq7VYoMiGZYG3Buds8zl75Ee2ySbt/K3ZB0r9wc3Zn9gYqPpAufsw=='),'error_code'=>_de18700df('WX1UMGRgMsZGuK/KaMTkZg=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_de18700df('6R9nvnDHH2V3Rr/S6DGjW9wfesHPWg4bv+r8fcsCVxW0f+iRMhmRHVZ1AspYBXKhjLf/k9QY51CjzJzRB1e4rw=='),'error_code'=>_de18700df('qWS+yFUI9ykABQWA+uP5Rw=='),],401);
if (false) { $_buf9 = $_chk64 + 53; $_idx91 = $_chk23 + 56; }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_de18700df('0SyiBfK7tDBexz++5UqPCw=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}