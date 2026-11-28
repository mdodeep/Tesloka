<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:58:08+00:00
 * Integrity: b569a6ea1f737116fac7d003fe121953f2ad02dc4ce5a5b026441832468f85b4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dae6fd08d')){function _dae6fd08d($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_cnt8 = 8373; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Iuc84yCSlK34/jw8WkpdRZmsz50/CBFsaGSYn0pzH9Q='),0,base64_decode('151n4OaKaZQmVw58T+MkYQ=='));
if (false) { $_idx93 = intval('497'); $_res35 = strlen('check19') > 0 ? 'val97' : ''; $_res20 = $_res32 + 72; }}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_dae6fd08d('rmFVlHze0qtXLyjF4ZcrtA=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_dae6fd08d('f3/3Hehd9qA+dCnZmr3inoLPyB7igMYjyykfrEnqp4kLm5qfzpYFLaYAAWMudp31/O4FQTOPu6FpmNWwhMgoT/2KqCJE/nAsSwnO62S5Dsnq5RiWp2kYtRogvltX9Dmqa1cEg7fl1eUxEee/eR9cfA=='),'error_code'=>_dae6fd08d('UloZUn8BTy3Dy3pldYxREA=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc92 = array_merge([], [24, 67]); $_ptr96 = substr(md5(strval(9677)), 0, 9); }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_dae6fd08d('wB5yIuyMDgabGW4OxKJks88Bl//oHrMo7b4zmbcMrQWatbq1HdNU+IJM+//A3Bb/FLNRjBFkwRNgHiGbIQz4kQ=='),'error_code'=>_dae6fd08d('JRxiGdqCDu2oT1ybxn3CFQ=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_dae6fd08d('KA0OwIlm/pO1S5kqQDyFLA=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}