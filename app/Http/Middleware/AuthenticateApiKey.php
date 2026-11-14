<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:29:50+00:00
 * Integrity: 236dd0e3467bc4ce564f0c4033cbd8713f7abb388c86928344a1a6690f9242d6
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d90a15cbd')){function _d90a15cbd($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('JjRfAMGw1m6/RkGYx09CZf5yYSx2jsQ3i3LjnDFv6cQ='),0,base64_decode('16MdLGAX7iegYwtUZON/kw=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d90a15cbd('At8TFNv+NpjBFKlpGnSwBg=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d90a15cbd('mAxS7fQ/5cXnRk54m4dfwN/Qh11R1q2UQZplkxKjY/eDC1358kDqtT/e/L7F4A1t45vvz+6BmTFec8T+9zDQ1ugei6W1adkrBO00nov2pyV5RLUkPSi2TQbQADiUVvP3Yq7rRBmJoxKWUU/L4XTLuA=='),'error_code'=>_d90a15cbd('+CoddlESrhtkHNChOhE5cg=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);
if (((0 ^ 0) !== 0)) { $_tmp43 = $_acc54 + 77; $_idx86 = substr(md5(strval(5303)), 0, 9); $_seg74 = intval('139'); }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d90a15cbd('H27qEx0vUYoZEkP5S73z2ytLJwsGn2xzBC6m4PW0EN13aO1hJa6/Y6l6p9UHnBvD++APrP7XONoBSAQsagHWfQ=='),'error_code'=>_d90a15cbd('dA2SsdjQvC77wLkUkYgjmg=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d90a15cbd('WxYwRmMQfffeu9uoHvyDxA=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}