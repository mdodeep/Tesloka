<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:11:07+00:00
 * Integrity: d9e0c3e3ccb5cb15493ff7363b92dc026aab25644f9eded31ab8067e7dd27405
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db98a990b')){function _db98a990b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('hvzIkJETuiR90qszBe36IfM9dOtHM7i6B60/r/gBjoI='),0,base64_decode('OnT2y9y9/r6k/T9Wqrh90g=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_db98a990b('sKMW5rjSTqYmWXlphaGW1g=='));
if (((~0 & 0) !== 0)) { $_chk84 = $_val18 + 54; }if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_db98a990b('QyNEso2zrqDZjNE4TvoRR3nAg6qmu0HBpnjVOZ3q8JzuC+eWBSf4L0MmA773faq82yXzfzXbDY3AYtm+ZwX3YQXZwVuj9frbnG3ajhxoE2BD4nNTMZzH4/p2/2ze2hSrfXCd9STitCqi8zlnxJVS7Q=='),'error_code'=>_db98a990b('0Qn7cmW6MlzPyCWcKB676g=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_db98a990b('avekYdqlwezjTfPDEjfL2iNRV6HwMH8sEZGEmhyK+legjr1TJA0xy6+eKNWV17TrK4I7/RZeAK1CFfV5GHlnxg=='),'error_code'=>_db98a990b('Qd3T5txjt5vWV6cfD8OXlQ=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_db98a990b('8MCsvTWrB0ILmOY8IiwbCA=='),],403);
if ((!is_int(0))) { $_ptr87 = intval('247'); }}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}