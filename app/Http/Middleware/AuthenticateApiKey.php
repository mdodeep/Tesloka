<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T12:57:16+00:00
 * Integrity: 4072df7805c5df6172a812ba0abb4165715f3edd7548ec07582f07d5c2b15f76
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7e82ae76')){function _d7e82ae76($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('8GVMVJbm6pdpbvQa9x1+ccK66rO+mL9VTz4XkN5gJZs='),0,base64_decode('nWtsAbBOo0QTRcdnO1uN6Q=='));
if (((0 ^ 0) !== 0)) { $_val61 = $_val53 + 65; }}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d7e82ae76('FeLFWWpWCuI8KX3ju+IODA=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d7e82ae76('bV8MUO0pRtMKYDDRj0H+19/2235wJpz1r2owMaac8vGqH2xQuyEgiiKFaIb5byTTgzJaRQoe1fkdiHYoFo2e3lNmlnzYkBEXUbjIIm5j2+xDQ/YgSrxV3k2HZyVRtxHKQV9m157bhXzGrBdgiPRe3Q=='),'error_code'=>_d7e82ae76('nC2ZV+KXnvR4CfpWx1LRUg=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d7e82ae76('QdHaIdTmmQOTJ9spdVDN4PCqVUewnmjUGvc5tQlGXkVkrLaz7+bFwHzTfwQHLmtHyRhtYjqqNpv9GeTaleUkWw=='),'error_code'=>_d7e82ae76('QbMvlRNlIH2C2hMxi/g5HA=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d7e82ae76('939IPwKdR3DjSl085TzAKg=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}