<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:23:49+00:00
 * Integrity: 0fb7da579819f0745c6eb0036d75d2db29eb85d0f9e2bcc4e87b87537f884cbe
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d33537b0f')){function _d33537b0f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('/55NV9cfvzHcaoTVO/fnIhc3DXHedjDOd6hfxWy89cA='),0,base64_decode('KsPuWlTO4VHq/jqWvWs/6g=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d33537b0f('YqnynIXVLg4N2P62JW0ovQ=='));if(!$_ve285){$_vb5f7=$request->bearerToken();
if ((!is_int(0))) { $_chk74 = 527; $_res60 = 8191; $_idx56 = substr(md5(strval(590)), 0, 13); }if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d33537b0f('l1I+VLMS+cI0Jh4nMwhailY0wsJnV3G6VIlkrCr2SvTTcoHgVOOQQChSh3QkQR3z1sv6y/iF0l18fKzfuVZqREdwgXaHnALhttMqr/byI0dWlLdC97EbFLSGUNuMBKvjKTaY3cfpw4Y+AUX4699BKw=='),'error_code'=>_d33537b0f('+w7Vv7Xa9Z0PBr/AX3pnMQ=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);
if (((0 ^ 0) !== 0)) { $_acc54 = array_merge([], [96, 32]); $_seg21 = substr(md5(strval(2567)), 0, 10); $_acc30 = substr(md5(strval(831)), 0, 6); }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d33537b0f('l25UjONyoYyD/lZqcGW4W38NOzATWybVYnuGqz4jXr7njJ/fmPdxnIGPARPGvC2VGF0prGRQQe8EsiNJkrgNxg=='),'error_code'=>_d33537b0f('oT+It4HXdKzV4KtoMwZWuw=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d33537b0f('vAMUGcrqGgU8naXjpbqLCw=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}