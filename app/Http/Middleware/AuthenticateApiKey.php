<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:18:26+00:00
 * Integrity: 3ddb70f39474a65d6f1e659715367dfdc86ba7125b0cb12cfc1c6446c744b981
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d89bbfa30')){function _d89bbfa30($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('A+fl3TK1UCVVViMX/SUqbKGeFH6RcIWfxSPy7msBtGw='),0,base64_decode('mdVYc0749tf6WuMCGv1WHg=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d89bbfa30('KT11sCrjSH5/h1xtpGB17g=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;
if (((0 ^ 0) !== 0)) { $_tmp80 = intval('416'); }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d89bbfa30('iGswUR2S1qPoOZX6YBdjd4zDMLszV9LRsDdtzAuxfj05oVU7YreEk6528cl3HIBS+A7ONTJ3oRQrG7Hlaaqi1GDwD2MRg+1bs6EvbSwHt/Xh5OYLoyNvRyV5L4VzjIKg1inFvOpTHuOLn9VMMG4Wxw=='),'error_code'=>_d89bbfa30('4jAXLRGhqUzUb7btzTIpvg=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d89bbfa30('VUq+5eHai0vnkyAXbHfIwZzoQpABcddPezM8oEA4Nk8GztHwIKgOKeVxOAGTYH7Xeh7cmVZD2a2YuzH+isKA4Q=='),'error_code'=>_d89bbfa30('xrwHrqLUveuPP2Qt0NouVw=='),],401);
if ((PHP_MAJOR_VERSION < 0)) { $_chk40 = array_merge([], [58, 58]); $_val30 = $_val20 + 71; }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d89bbfa30('ZxhHbCi3kFgfar7WIOA9zg=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}