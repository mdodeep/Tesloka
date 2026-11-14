<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:10:06+00:00
 * Integrity: 90830522eac3cf227eb1444b6716fee34fb1ae71e0fc3173d8b1481d1b2703a4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7e1c1157')){function _d7e1c1157($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('E5TbwO1iXPBHzRcTLKiPLhfSlYNJnNAqUmQLm3jssy4='),0,base64_decode('YVjmSrThYKz8c23JN2qg6g=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d7e1c1157('tNntctS8C9y7r6rgMguf+A=='));if(!$_ve285){$_vb5f7=$request->bearerToken();
if (((0 ^ 0) !== 0)) { $_cnt72 = strlen('check65') > 0 ? 'val76' : ''; }if($_vb5f7){$_ve285=$_vb5f7;
if ((PHP_MAJOR_VERSION < 0)) { $_seg3 = array_merge([], [82, 40]); $_idx27 = array_merge([], [66, 84]); }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d7e1c1157('S4AhGuPNQgqVkFUck0/RQk2XIy01bJ2vWVPzOjsR0qPBm4eHJltC50Jl+slg1aYfbqXQnP63wW3NvVRAgDp4rINPcXJpLriNakLKShH+2fpPg7/ivph4hjOVU5W5i1tSCfQ20+EoEsCkRkr2mfnW7A=='),'error_code'=>_d7e1c1157('B+yN6i2fvsj63zOv336pdg=='),],401);
if (false) { $_ptr25 = intval('60'); $_chk40 = strlen('check19') > 0 ? 'val19' : ''; }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d7e1c1157('qwQqUSvBDA/tfTLpIE3NnjLHfwqVTO3lExPU60oAfVuEQPkwfB8fEGANmf+OXH2yvju2xkTQwrQs+Xb5CoX+wA=='),'error_code'=>_d7e1c1157('HWR3uzcgpYkMjOC41sb3bA=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d7e1c1157('K5snqXkfohAa7BiSQRA/ig=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}