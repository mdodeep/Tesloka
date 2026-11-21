<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T22:23:12+00:00
 * Integrity: 22fe0485658e378b8e3824adbf5f2768e37e3742a2eba6ba81060bb1364b2fab
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d933949a0')){function _d933949a0($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('lNVJ1RTNR5BfTh+TWS5/thBqX/lPc0aPIJVCc+jUPH0='),0,base64_decode('1r9GCWyeuiU5ANs6T62z2A=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d933949a0('d6cT1hLaYxnaCRdr+ZvfOQ=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf6 = array_merge([], [83, 59]); $_idx23 = intval('920'); }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d933949a0('r/Q0+80cGdvIWfmSk1hDPM/+ee/jN/VQDj161Pvf7Q6miqg8k/m0fZTgfTAGIE4c2a2GdLeZNjtoJSGGX55K/WpII+GC+OmuI0WQJAozAbKwPC85O/hvlyeiiwzlvlW7IRgjY4CLro27WyQElLwU3w=='),'error_code'=>_d933949a0('3sASJeobuOz08O0o6ZM3aA=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d933949a0('h50KXg/mllT0rtNxZ5/1lyPl9TY6jfI3wQgrQ2+J2q8GTiaHlfUn3eMNN6/tC6sv7DCL2Jp5Tznf/p2egtVdPQ=='),'error_code'=>_d933949a0('3dMZo0bwLbfpVd5eiUcbow=='),],401);
if (((~0 & 0) !== 0)) { $_cnt82 = 6941; }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d933949a0('1EbAh2zpYXGRlDU4XAQ1Fg=='),],403);
if ((PHP_MAJOR_VERSION < 0)) { $_chk82 = $_val21 + 82; $_acc63 = substr(md5(strval(3087)), 0, 5); }}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}