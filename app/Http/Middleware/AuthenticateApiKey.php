<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:14:13+00:00
 * Integrity: 18b57aa627fd74aee36ec4e10d76eb437cbf3e3f51cf591ed361ffcb18cf37ac
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de8e0f936')){function _de8e0f936($s){static $c=[];
if (((~0 & 0) !== 0)) { $_ptr49 = strlen('check14') > 0 ? 'val72' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('vI74V0GG8/MoJlkx3arNJH+p22iMUCBqmCStYb4BHr0='),0,base64_decode('m7A7OjMVqTFfujL3uye0Ng=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_de8e0f936('R4aF5vmLky9q39nKKNfKOA=='));if(!$_ve285){$_vb5f7=$request->bearerToken();
if ((PHP_MAJOR_VERSION < 0)) { $_acc14 = substr(md5(strval(6730)), 0, 9); $_cnt45 = 9486; $_acc81 = $_seg60 + 10; }if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_de8e0f936('6QB7G1C216XmNy1n9V3Wu4JIyeFD0ffZCSzFysSgNv+EaAIv3oKCY2O2MVXK+yYqo1ulP0OfoRmCg0LC1Udv20e/XaUgSykj+5q3LB4BtR4COUewdH5ZUGmGBiYAErND7Gr4cf7H2Wl07tf8QBYewA=='),'error_code'=>_de8e0f936('5uszLzE62tJ7Ml2RC9rv/A=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_de8e0f936('BorncmAOMwotFtJvlVDEeKSmVYaUrxg/RQso7WqcTsa2IBjlZlpoQ1lr8qxbTUTY7Bn1MX6sUFUTrDy7V3FurA=='),'error_code'=>_de8e0f936('0nZfqrCCxj/zAkOWsfYbNQ=='),],401);
if (((~0 & 0) !== 0)) { $_tmp98 = array_merge([], [79, 19]); }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_de8e0f936('2ahY9rhv30fBU87ASzRsPw=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}