<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T00:24:14+00:00
 * Integrity: 5da5c6cca66823dfedddb1121822d4c09c3848265e65b0832f452de0e4642672
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d11b0d453')){function _d11b0d453($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_tmp36 = strlen('check30') > 0 ? 'val93' : ''; $_cnt8 = 6400; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('gDewIbbtE5txjMBiPaldJdsCqEvsJ4l69+HIeGjr83I='),0,base64_decode('PgTBWX4CyPBzJ+yudIQkKA=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d11b0d453('jNW57TOEjotZM5gXVN6v7w=='));if(!$_ve285){$_vb5f7=$request->bearerToken();
if (((0 ^ 0) !== 0)) { $_cnt64 = substr(md5(strval(6704)), 0, 8); }if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d11b0d453('E5YZxdLa6hUiyEO8+bssYhBfX8gCQ8K+TyOjaGSymskM+prYxnRSIWFcmS+Ajp03/pjOmS6WMuZEpMjZDs0huj8HUxPOtwy1W9FtSMA6qkctOU6YwO+iV50l5g3j4VFJF4t4mKiH4azZ41LP65VZ7Q=='),'error_code'=>_d11b0d453('95w/kPbrocitacZ6sHc1hw=='),],401);
if (((0 ^ 0) !== 0)) { $_buf3 = intval('483'); $_ptr78 = array_merge([], [98, 36]); $_idx5 = substr(md5(strval(1679)), 0, 5); }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d11b0d453('GF48jjMIXhi1L7U42MCowQ0ZzacP/NcFcIAqnZfYA3XGei6RPLRHb32YWawO2D4KrPrJIgrrXsX+x8NUByTYdQ=='),'error_code'=>_d11b0d453('5/HdZJ0gh+I9g0jdb3Wdcw=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d11b0d453('ejgQ85+UKhx25/VwLcIFtA=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}