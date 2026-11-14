<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:26:08+00:00
 * Integrity: 36c9a2f4caea85b0d9be3587e3b699cbbb3fd8478edd5758bd9423d7d268d032
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d0f298330')){function _d0f298330($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc46 = strlen('check74') > 0 ? 'val99' : ''; $_res21 = array_merge([], [56, 60]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('1wtmZyQnaNWqYO/rD+Rr0O33gghCcnc9UNLsjCslNAE='),0,base64_decode('OoEPgUX1KYJVQx5cwiZjpw=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d0f298330('SSTB8rgu97xqjmoPBcp6IA=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d0f298330('0KxoS849F+vFbOYsTgd0uw3+9lQhinkCit11ZRckRSConnT4BNW2C9vkoy5gyYNnq9lErWH90wmsP00LHN0Xsdevj6Ad6TqrmSZ48KjFRIcK3GaVN5HW5IXyZZ+NJYF/PtTHFgTmFBzakD9vs9HCPQ=='),'error_code'=>_d0f298330('R3o5aWmFv8vhqtJddb3gcA=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);
if (((0 ^ 0) !== 0)) { $_ptr15 = intval('757'); $_seg48 = strlen('check47') > 0 ? 'val9' : ''; $_buf9 = strlen('check89') > 0 ? 'val90' : ''; }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d0f298330('OyD/PNdkDLq4da25I63XFHeYsMOOWijiJeXI9dt39bOQIVblqKBjYuTmaawECbj7y15ofcQf12/Jz92Uu1Zz5Q=='),'error_code'=>_d0f298330('DY4voabGkYt5NCVGz59SLw=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d0f298330('cuGGVlAaTarXlaSuTt/1vw=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}