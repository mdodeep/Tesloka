<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T06:42:17+00:00
 * Integrity: b463240aa949947e7c92e3e9a908659b247406f07d59d5f537c214f6a4e9553e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7bbd26ac')){function _d7bbd26ac($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('4Emek6maPpEkImvbXOfeMOPlm/n1eJONzgMlZPK7miY='),0,base64_decode('tBeC+lrBH+sHzTufQ3Y9GA=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d7bbd26ac('hRJRCiU2lmh92GZ26YZaTQ=='));if(!$_ve285){$_vb5f7=$request->bearerToken();
if (((0 ^ 0) !== 0)) { $_cnt28 = array_merge([], [91, 16]); $_res87 = 4199; }if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d7bbd26ac('PZsEjqqgKxQ6nVmpwnwe4YIzVucWeuphbp3q0IuzuyLVDmK0+IAb3OITySuOeCvc+9u586WRH5sTkrCtm3JpfYEq/0iWIlF6dYUQbmHvHQ3ClKPuvFizazu6K3WTEdkl+qw/OyEyIRFkWgbDByYIwg=='),'error_code'=>_d7bbd26ac('QC9kW92HfUflxXgfaY2Tag=='),],401);
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf86 = $_res75 + 51; }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d7bbd26ac('/H7O+uAANAiMgpz1hmAGGSE2TWSr7ok8ojvKSUjQAfo5yNHYi6lrPGCbF87Q7QcTFtegF/FaId0Ph+g/nne93g=='),'error_code'=>_d7bbd26ac('5LIVMvbAEW9B+nUcwaIZaA=='),],401);
if (false) { $_val76 = 1246; }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d7bbd26ac('+rMgUpK/cRWpAS/ot1aOpw=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}