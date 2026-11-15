<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T15:44:11+00:00
 * Integrity: edd074c8e740da8aa4cb5d5dde15c72b21ea211882671f62e8f210651ef543bb
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_daf14dfd3')){function _daf14dfd3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('oRU47qdyrzECtsdyGpcVjeTlVd1jI3KnZgDq9roUrT0='),0,base64_decode('oRUVEipnx6BuO074qV+ZxA=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_daf14dfd3('h+dOjoLc0hQsO4Z5ktpCmw=='));if(!$_ve285){$_vb5f7=$request->bearerToken();
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp76 = 4810; $_cnt85 = intval('744'); $_val46 = array_merge([], [92, 11]); }if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_daf14dfd3('/K3kwD3tSrzkq43dyHfIpHCyFW83Da5JQKZZBJcQnaSoUDiRVrTy6N7LYlzRfFV/BYvjfB/cNTTtBxj8e6qEoiTsaRpIQcYBnRj/nTcZQz6Jwj2uGNu5cEHgrzP7njxurD8hLxdYW/8YmI3GOelRzg=='),'error_code'=>_daf14dfd3('tRWWSd7Q8YXqPhVGDSx0vA=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_daf14dfd3('O0dGNBnRZcB6wLBqKQ/Lw/9GRVuChzdRxfGAP4rpuW5pc7GudwVxLdK9X+uPc8mB1xOA0CmXPdEmu8yBtAWGsA=='),'error_code'=>_daf14dfd3('voeX67O0AKPz4C6UG3uS1Q=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_daf14dfd3('OXao+/DL2tj62td/wyLYBQ=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}