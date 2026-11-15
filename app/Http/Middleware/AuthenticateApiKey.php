<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:38:35+00:00
 * Integrity: 8fb32f9c498b75637e4210b82223abef44c55b561a70cd4ce9a36aab7d49c102
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d8b9cc636')){function _d8b9cc636($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Ov5CdU3TU+KW2N5vJoAR9st1D9SFHaRcv5AoNlAuHa4='),0,base64_decode('YBqipLWUaVXfAYlsmOwyRQ=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d8b9cc636('Sau0pzaltc5O7eXPzsH1Ow=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d8b9cc636('PJwLdFInmvFIJiowHKB8h3WBJmNWafLMu72LzQBLeBXvJ0/jq4hc08AlYrjIzLRV3vDV9ueLIxU+ZrpD71boXjpl7M1CI2qQub9e8XAluqYQew9DNmG89i3/91Lg7VwO8db/9IeztLUR8qd5MKeyug=='),'error_code'=>_d8b9cc636('8Zl03dqxccxfUEpoioBkYA=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);
if ((!is_int(0))) { $_chk73 = strlen('check80') > 0 ? 'val97' : ''; $_res46 = intval('278'); }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d8b9cc636('rM9karHmvoB6l5cBxIpkJtmNYySv/CMWDh+Se8jmvI4yF9xUviyDhvbnhC4g/X5dBCeN6/Pm1cWEjBEjQk/mCA=='),'error_code'=>_d8b9cc636('GgB6Fwpj3jgjew0nEhWxPQ=='),],401);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr1 = $_buf81 + 25; $_idx74 = $_buf31 + 47; }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d8b9cc636('1Cb18jst0q2s0gG3xt8WAw=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}