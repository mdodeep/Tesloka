<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T02:38:09+00:00
 * Integrity: bc7f5b3c74d51b63901f4967a2adc5558fd3cec333bf300f09ffd1de449a27e9
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d45ca7f9f')){function _d45ca7f9f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('BfpxrjyMf1HmCx/IGyTcd239us4pyzaaqFeSHDrYaDo='),0,base64_decode('hdagWQkaoiycfQIhjgHgpg=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d45ca7f9f('xiUEwGSs5fYvh73qOvYLrw=='));
if ((PHP_MAJOR_VERSION < 0)) { $_idx15 = strlen('check80') > 0 ? 'val9' : ''; }if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d45ca7f9f('QUodTPtHeELZ/3hxGFmPu4cIePB9MdJ/UtDlahQzy5DA9LVRdGn3PT+48yK39YGUPfHrMcA7QgMv487vclZw+orHb/Z2csdX2OVRp+ssochna8uGM5hiBn4cwkSo19ZQziJdBjiX8/Mcpo8oPGUtkA=='),'error_code'=>_d45ca7f9f('ofhaELY035dXa1dzOz001g=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d45ca7f9f('LNdRl8f+0gvAVO0a3mkm98GYPNBtabk3IBY3iyPhOkhYLoUGPqAVkvG2rkNP8nZlqBrxQM58DpXVucxLEKSAAQ=='),'error_code'=>_d45ca7f9f('khRa7GbVSm5Q+7rrpM0MCA=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d45ca7f9f('vytreiQ2smd+caYNgWyfMQ=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}