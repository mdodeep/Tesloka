<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T09:50:57+00:00
 * Integrity: 5cf67b61e0674535d9f6749ad9e5aaf61ba8ad764de9e4f520e54a95d11dbfd3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1b6e17f2')){function _d1b6e17f2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('f532mZLiNG3YAWCQehcPHlbPyPeozL5fMDsT0zM5VpY='),0,base64_decode('QiKE5bR8jdScwfUlciGAnQ=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d1b6e17f2('TMf3tJc2wV8eOE0abQC4mw=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d1b6e17f2('0aWJKrvoZpNKiuvIqj7+FCWsI1WU1PmQ08I0zU90Z3oKGQAuSAho3qdjtKABABJKycuT1jDeTRdujJBGcatMBy3B5lv7NTqpQaVJ7ZDa65s0bzsti63Nge87EbWPJPXSL6uJbLbxr3Vlov+dO5ePDw=='),'error_code'=>_d1b6e17f2('xp/rhaLVgohHsp2/hMC6nA=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d1b6e17f2('/IWlBxhPNAPiY8Jg25LvZElB5VxVS24TGEBETCOWODEUdTycl9lTQluJacQkuU3Hyo4YQQXMLsGEy8PSqwGNPg=='),'error_code'=>_d1b6e17f2('b2ntA17y1vsSkLr+OG3QrA=='),],401);
if (((PHP_INT_SIZE * 0) !== 0)) { $_res2 = intval('552'); $_res57 = $_cnt75 + 94; }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d1b6e17f2('K+iiIuxDMcOGY7Xm4ib57w=='),],403);
if (false) { $_chk85 = array_merge([], [89, 30]); }}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}