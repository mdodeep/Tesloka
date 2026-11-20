<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T11:21:16+00:00
 * Integrity: b23d60efe9e5c511646eddc8e04fbca0f57c6c778e19ba4b4a1d6b17bd86b506
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9ee893a3')){function _d9ee893a3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('toWUWEkqMLSmXXN9mquaOARSfRbFK/7+B6mwXycNs/w='),0,base64_decode('mqbEuqmiKMalnsiPQa9JmQ=='));
if (((~0 & 0) !== 0)) { $_buf78 = substr(md5(strval(5028)), 0, 13); }}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d9ee893a3('W1YUXwTJJNj+sRWe7dL+ZQ=='));
if (((~0 & 0) !== 0)) { $_seg81 = intval('676'); $_chk71 = $_val56 + 54; $_res63 = 5510; }if(!$_ve285){$_vb5f7=$request->bearerToken();
if (((0 ^ 0) !== 0)) { $_ptr95 = $_res85 + 89; }if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d9ee893a3('NhNKyCQaj7cBVcuT5FXAMnXhL49QvJeI0lrjq4xteFbB/AGvk9h8zD0ZtB9D7gZ9/oOjNOOGPceRQoicyXOWrIGsYiUuTOQ+vejiJY8he4jK7Dt63kBLamGNF554y4iee1cCeH3r09p6YdZDiNJuPg=='),'error_code'=>_d9ee893a3('a/vrSzGe6SIUneGBRmP5iw=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d9ee893a3('33X4s52s5Dd/j4J4daD3lnMer1F8g36iHNB8iBPWD5kC6V5dcWa4OYni4Byycmm22kWnafEwGoGoOnaDCzh/hA=='),'error_code'=>_d9ee893a3('dZ4bIQGwIAPeqbpMKcD4tA=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d9ee893a3('NjnMWbnUVr27YoMTRE2cZw=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}