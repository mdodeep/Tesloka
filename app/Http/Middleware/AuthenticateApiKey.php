<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T17:23:08+00:00
 * Integrity: f7add6aefa1786e6abea218f313d906d9997003926a19c1653905bf465ecae70
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d68e1f64c')){function _d68e1f64c($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_ptr19 = 2155; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('MlCad/pUQ5Wlrr4w8uBI/0yv9MlH8qYgUj006E5Y/PE='),0,base64_decode('yL/c9NmOP/7rooyWbq/tcw=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d68e1f64c('LHIsGi2/Dk+pmlGe0KzR4A=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d68e1f64c('RQhuSglctLcA74zOtwtJzlfiS9Zc+yXKPKoADHg9coLX8pTMx/JtXh5p6VXtET6j83F7tTJsm6aEDYSCswxL6+3M9TSfKphfrA4MqokIyXs6nFGOX89Cm0drhrUjuwzy43IxjkjjiGcAijR/etdvKw=='),'error_code'=>_d68e1f64c('Ux4IiYz854I6ddnDKAE7dA=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d68e1f64c('DzZwl4CLrogCpxHP4CnQJwUFT0bgcfjnkN2V/enFadOiJ41rZ9yscarduqyZhx8/BrK5I4R9qsZYjb2OlScm3g=='),'error_code'=>_d68e1f64c('D+Ej32yDWY+96YN8L+j5Cg=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d68e1f64c('8eH+j0AN1WeE9RxL6xyp7w=='),],403);
if ((PHP_MAJOR_VERSION < 0)) { $_val49 = intval('331'); }}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}