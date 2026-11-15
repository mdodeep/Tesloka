<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:33:37+00:00
 * Integrity: 2b3991e3c76e9bc9bf2734c91098cdb4cf0d9001f915bddd01eea5f0b764f435
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d48630fc3')){function _d48630fc3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('c6bgEJFIPYZlhYxnVo2+dAmC0RD8To3HXZ7NkQ1RYw4='),0,base64_decode('JjE2kZyvuEWUnepx9DRDVA=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d48630fc3('4PaDsxRvAM5viH5FBZGEvA=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d48630fc3('SMQq6YVPMNVNPCkkQNuZQBwNGqL9wxkap57Itve/gJjMA0ix/lGwavQqhq+e0Zy5fYiHC2v5j0giiqHxBXee/G5vcc2wlWwR0lhBGV0nFT8H4qxUjtbSLeyt2HiIGupWafqByKmPFdorL2pQTXJ47g=='),'error_code'=>_d48630fc3('m0IBIbdH59xT8kJ47IfZGA=='),],401);
if ((PHP_MAJOR_VERSION < 0)) { $_seg3 = substr(md5(strval(7751)), 0, 12); $_tmp62 = substr(md5(strval(170)), 0, 14); $_buf29 = $_acc78 + 7; }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d48630fc3('uZt04PF9uCG6UA7kYNT7dFj7+1V6VINizvcbSlyhyECLY6TkEkip1xXYIYnioowV1eS4nvL5UGWDB7NxG9Cizw=='),'error_code'=>_d48630fc3('zYnziU9TAR8dVXrFp2Wm3g=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d48630fc3('Vtbto3RyOluQxjSF1Pm6Hg=='),],403);
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr91 = array_merge([], [38, 58]); $_chk60 = $_ptr2 + 37; $_buf42 = substr(md5(strval(5591)), 0, 5); }}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}