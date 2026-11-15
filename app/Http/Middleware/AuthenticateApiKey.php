<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T16:03:53+00:00
 * Integrity: 72d6c2a8f55830d6dde7c4fc6854949f9ed50a91f2785841c39a708f3a0fa05c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dd5dde1f5')){function _dd5dde1f5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('DUo+OQmIHyuzddFRT6dj0Lnnujwj9z9E3Su32ghfxtk='),0,base64_decode('6b8xvQVNq9eOe008C0uh0A=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_dd5dde1f5('kJTm/KtjktkWrDkYrSjgTw=='));
if (((~0 & 0) !== 0)) { $_acc35 = 2183; $_idx49 = intval('2'); $_seg72 = array_merge([], [94, 2]); }if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_dd5dde1f5('V3vuKU2MnYFecA9OtLASTt04dO6CCZPP9segp+7N9op2Le5mzxO+HIZ0mcZCdr/JjQJkj47mgmdsAZbKrWcpZArAl/MBlY9+vBOVsKqd4+A653DY7go3vBEv1ccAu8I82uFJW7LSyiEDUL6z3SZ3MQ=='),'error_code'=>_dd5dde1f5('pumnePACzOEr/V3GqJO9Dw=='),],401);
if (((~0 & 0) !== 0)) { $_cnt71 = $_acc18 + 100; $_val68 = 3141; }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_dd5dde1f5('E7OopLjZGEEgjDyz0nAnvbybKh5ft97uSAPdFKS5fCNFCk85mGm3zhppwboWVZTy2wIMbP4wey8SJvJr/RGbSw=='),'error_code'=>_dd5dde1f5('PHZ4buEajGLHmThxHyQndw=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_dd5dde1f5('lx8CM4Sv6G5iyi2zRnYWYA=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}