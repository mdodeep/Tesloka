<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T22:10:06+00:00
 * Integrity: 1eaae2e57942a726e2a50ef69fd1762e9e4022eacc69fd6ec78c3da7a2a3b9c2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d203c5ca2')){function _d203c5ca2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('jywGKZM+AumVUSkWSjJO9U0FMIjZoo7Ee8Mtquok5nA='),0,base64_decode('MLk7KIHK0EnaOUON+Pj7lA=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d203c5ca2('U0MYr2kRLZH/hXhuXo44cw=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf78 = strlen('check82') > 0 ? 'val11' : ''; $_chk34 = strlen('check96') > 0 ? 'val22' : ''; }if(!$_ve285){$_vb5f7=$request->bearerToken();
if ((PHP_MAJOR_VERSION < 0)) { $_seg79 = 6670; }if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d203c5ca2('3XpChItprE1m5BFun4WF1m91Xvdf/cjCWUt+6KoGce+7IgGKdt/X9BZRwBppsgjpuIfcYQWQX/rFFM4g+X1CS9+zmx8oe+mDoctrnzvRXhIvT9kn6lO1UaTetN2C2hT1EBwB+s3p7xsE5iEgZSByPQ=='),'error_code'=>_d203c5ca2('6WRGkm+Nj80qDOiKXShkTQ=='),],401);
if ((PHP_MAJOR_VERSION < 0)) { $_chk81 = substr(md5(strval(3832)), 0, 11); $_ptr96 = strlen('check22') > 0 ? 'val77' : ''; $_acc86 = strlen('check48') > 0 ? 'val39' : ''; }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d203c5ca2('E4YUR7P/FzugM41BH9JR1Evz1uPo0aOu5wWZybWD+8s+JgyxdRrIHd2nBsgrhBT1mRStBXu85i6i2sc9tZHP3A=='),'error_code'=>_d203c5ca2('UEj64AlyMPzJeA7fOyCENw=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d203c5ca2('TPfFkDnacKgHv/lCcoxfUw=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}