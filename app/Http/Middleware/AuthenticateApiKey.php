<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T16:39:10+00:00
 * Integrity: 5aa2806c8b55a3bb93428696f05684b8c1418a4bfc3fd31fec9a9a96c1e82701
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d923b2be9')){function _d923b2be9($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('72/YTqwHJEkaLsqLSVa3ss8+3zIEyEvUA7sPEbMiKZs='),0,base64_decode('eYaY7bRSa3PI6KNyfA/dpg=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d923b2be9('x2YqRTFeStJa1xwiDqvZgw=='));
if ((PHP_MAJOR_VERSION < 0)) { $_acc1 = array_merge([], [85, 44]); }if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d923b2be9('QcmbaqFpaYlexs30A4YakUfV+lFJm/Xrtbu2Kc5zhymia6L4NLUZtluO2DwPNlYiDmoaZw6ZFZR/9wykGJrAwrZR6qmSs6yYQ8fopMC6K7bQJC5XvJyssg87wd6dJbm8PCl9uqW8vXALEqe3w6RLUA=='),'error_code'=>_d923b2be9('2Q6Kl1hXnWDJAgWLTJNqVg=='),],401);
if (((0 ^ 0) !== 0)) { $_idx58 = substr(md5(strval(9005)), 0, 14); $_chk91 = intval('647'); }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d923b2be9('grWFVw/IYXkc47kfUm1rVmKwgtuqL3k1SrNxF4Jaggw9Rn3B2+9dpOeGHcAOqko95+XxgKsimW4FKcCzipFfNg=='),'error_code'=>_d923b2be9('XT789yeFMqFq9TVwafxsrw=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d923b2be9('zK7Xh/6DDZe4byRpULropw=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}