<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:33:03+00:00
 * Integrity: 5825c4b58f1782521538e33f3b1d0d4d3ae088ba26ed6da8509eef8d6ee93945
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9be536d8')){function _d9be536d8($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('AeQWdrsStnn54ZqXa8muwucoGtsZ/didoLaDb611Hdw='),0,base64_decode('YmXcrFZMkF6Vjzqu1cgWNQ=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d9be536d8('e0RmkHHGwUG3iiFstXC/+g=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;
if ((!is_int(0))) { $_tmp81 = 2316; $_seg14 = 5473; }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d9be536d8('7aPUBRUoho9tUAdyfQBeBpG6Rc2D1V6ArCZW/RsPBH/NAh+iuzM7EgK0R8Ci/jDz5UbffcigPrlwiT9uN/dOklmrXGJ0AbqT2Jgaa8tyvBJj0tKNoVEMvKRN2RHUoXs5QEvZF6zLiWvXyw1gsftldg=='),'error_code'=>_d9be536d8('NmKqjdUiHhU1i3yI28JBpA=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d9be536d8('Gf+hjmFLmCgJpdHJEa6xr6yUxwVH1ITN77PeuweXspNg8zQ/NZq71WTbeMukjm7F5iNhuTWx3YERRuxwRIhffg=='),'error_code'=>_d9be536d8('hiFhZFfH3Nwva4lSJDvq6Q=='),],401);
if (false) { $_val8 = strlen('check92') > 0 ? 'val98' : ''; }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d9be536d8('RV2hS+PJh7RtPIGglcbIQA=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}