<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T14:56:37+00:00
 * Integrity: 48ea7b313529166dee117b7bd38ea4955a3d683cb26d869c92edd7d7b18f7062
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d89bc7d8e')){function _d89bc7d8e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('JpcVEkQjKQhlN4q1fruVmjV+JDEx5nAb+NCL9rmLxbQ='),0,base64_decode('r6zirgqnXbihYnqoJyiYaQ=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d89bc7d8e('ia7diuP/RdM8q5LLJkHewg=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d89bc7d8e('4auNAfTcU+UO6OL/q03u7Rztgpzo38eHv6Yzl1oIVP0nX3H+o8V0T9F5nh0K1J5EeHyWocLfb3x7s2COCuHP09yaUKuk+KDiMNuVTbag4RFkGio4vSDwNkLjAUSQ5YUiXb34z2oDFrPKo2StOuiIBw=='),'error_code'=>_d89bc7d8e('uLtRSGiz19pjDT66r7SWRw=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d89bc7d8e('QMbRqx4SIZ1W6jn334vES0OWO7v1Dep/q/mYf5r6uGix/6J1+uPlsZP+nbCiTqdEm0q3JUyQUmeZbewBOyjn2Q=='),'error_code'=>_d89bc7d8e('qtkH/nIrQ6J5470tpaa2ow=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d89bc7d8e('1x82aqO0YTZCr5ufKCXiUg=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}