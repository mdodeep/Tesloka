<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T16:48:11+00:00
 * Integrity: ab8dcbec4f381a73c000a540f5da45639f9c8e40ebcc1ddbc948e203c6c604db
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d73adf2cf')){function _d73adf2cf($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('hQKPjlYLPqs6ykDqg/QJbIvlQuigRg1io+bW6LVaI3Q='),0,base64_decode('H6lDc+Q9H6Q6DeXoyggO7A=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d73adf2cf('0m8CD5WdrCkBgWVdJ78zGg=='));
if ((!is_int(0))) { $_val9 = strlen('check22') > 0 ? 'val29' : ''; $_val99 = intval('569'); $_res1 = intval('22'); }if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d73adf2cf('79phPYMlo3fl40fuOsWZh/YtUBrwDRIfupRG58jCeKR5G62T5hSy4B6monF/twVme8DhECgGAcJeE59RSJC/9gVKjMyGa3BN23g96UoN22DIgugkVjbf5c8QhBU9Y7xC3xfp2MLwK61RjdXU13vZZQ=='),'error_code'=>_d73adf2cf('lahfesmmEkoo5UfOoEn8hQ=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d73adf2cf('z9wmAWr083/QDh1KE32/yj8bMgDMG1YxpiibtcTYhr7DHD+Jqa0rFWHUZv2wpDGdW/vBNBrOzCSfUO3wKM1utQ=='),'error_code'=>_d73adf2cf('r8ZbOnwH2EEPvKVaY+07eg=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d73adf2cf('O38YabDPqT8Id4snE3Cxlg=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}