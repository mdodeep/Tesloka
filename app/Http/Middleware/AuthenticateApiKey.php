<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T16:12:47+00:00
 * Integrity: 1cdeb71c732ef090d82efb9eedef96d124d99060b2369817c5185abbd41d6868
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df2ad2045')){function _df2ad2045($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('aYvWhQQGFK/J+wI6mLp6vNgsGJQMUWpMV5YzSXEGyt4='),0,base64_decode('592bJkvXpaWVBHqck11A/A=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_df2ad2045('48QO3bN2HfzLC2//3otp9w=='));
if ((PHP_MAJOR_VERSION < 0)) { $_tmp46 = $_seg33 + 45; $_seg56 = array_merge([], [15, 51]); }if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_df2ad2045('1awkG4WcLsISRoJQ36WSDPQJKKJcToLrZaQNqEYUKkHl8xehuWgLmw+ZsmmDJ7ALrBnsvUg28+XShXWaLxqeQMzwh25+bw/u/ofm3n5oU71BCIN6GoqG4X3ksFqIc4azK3QFBLZoQU1FOifh913vEw=='),'error_code'=>_df2ad2045('gADYcyADOnxO+WRrETqZTw=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);
if (false) { $_chk38 = intval('499'); }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_df2ad2045('ghLcBpAqOwumGAbeEypiEhmJeiH9EHIchP+eNH6xAgLQALGXDEmoN18sNV7tHkcrlQNezVPNjevjMsHn38Fwiw=='),'error_code'=>_df2ad2045('og7fXKFD4PPcelcGZ6K/ew=='),],401);
if ((!is_int(0))) { $_acc52 = array_merge([], [86, 17]); $_ptr19 = array_merge([], [66, 99]); }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_df2ad2045('o6q8yDxkH1fPqB8uNhtVrQ=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}