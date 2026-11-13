<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T10:25:08+00:00
 * Integrity: 355d438183c4270a99efdc1299cd916b84883368582d9ba9e9ce8f086bd847f4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5b5ca3b4')){function _d5b5ca3b4($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Z1oC9tTFTaESrukUIvNCPgPhs94h7k8bD5R9+3bbTFU='),0,base64_decode('8r0HNA1QQt6vI2B1gX1KqA=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d5b5ca3b4('+CzJF/5gO70O8rZG555COw=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d5b5ca3b4('hnvYH0aOhxqNI7DYD9gr6dHNKV0eWELgOFDfE+z4HxNE3tCCeUvQj/P2YlPhAptjtuQHcfrrh+QT15LEV+fnYkW2JMaHKvTZMkHyRdt3r3QaQ1DUQHDSgQcv7IgCSJDwbKIyLjdVeGeOxDCS0fQcnA=='),'error_code'=>_d5b5ca3b4('jjaKsTPGzgXIPMYvFvQaMw=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d5b5ca3b4('LKxSaVumjybSfjBO2hAsR07ed5VlT6LFuf6Eu7wVIpQAPAh3hZFkmrBfDnRjEp66F7E6SXcBJ2uC8moIK3f8wA=='),'error_code'=>_d5b5ca3b4('xmVWsrMmw+HUOIh8jM0bIA=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d5b5ca3b4('toThY9MGRVuCr0QgpUjdqQ=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}