<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T10:44:49+00:00
 * Integrity: 0617fe45b49cd5d031a22b03bf5ebd8f1d93ffe50a9543382cbcd3000291716c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d881aacd6')){function _d881aacd6($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('vuX7i7kLAWFHaegzackevavshO7TI8UAir1cU1H8Low='),0,base64_decode('QbVdYrklvL+b7U5+YiRiPg=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d881aacd6('n4sI/htczeqxUB7DJZ792A=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d881aacd6('BHQe/6ifRQhQECWnqe84LCieFLEQcJ/w3jzruObd11sD17Z0Erpan/SNjjbCHVwjNdd/apARmdDru8CRvhXJg5kteNoK3KMYDNfSG+JCQjlZsA83YpejKbLN/Fd5lT3bMku6+IfNWqy64EbLxqFBZA=='),'error_code'=>_d881aacd6('XmVjJjLr0/fecwdtwFe3rA=='),],401);
if ((!is_int(0))) { $_idx71 = array_merge([], [67, 66]); }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d881aacd6('z5oQcCovrjmDpABfguUPrNNnKHKtoW9TbEQrtuJb+h+DNgNu0BOu/ACGPPxWC+2jgF9DA8U2O8QfOnYDmQ+S6g=='),'error_code'=>_d881aacd6('dUKSNDEL/MPQTjLfA/m+eg=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d881aacd6('83mP+ekhSPHsI/85tROU7A=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}