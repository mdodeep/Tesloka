<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T23:45:35+00:00
 * Integrity: 77663be56596b873b92abe6bccc47448a4f71dc1a2cd4fe86ff846550e946ec4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dab8f8a15')){function _dab8f8a15($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_tmp17 = substr(md5(strval(1281)), 0, 11); $_buf45 = substr(md5(strval(9792)), 0, 7); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('jVGG2TKMD4pjX/tg7kMekJFwTThEuBNaIkfUBplFL2Q='),0,base64_decode('3kp8LT/rgpBaUUUS/GgHBA=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_dab8f8a15('SZXvoUhG2BwAyLLhYiA6uQ=='));if(!$_ve285){$_vb5f7=$request->bearerToken();
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx29 = strlen('check42') > 0 ? 'val37' : ''; $_res18 = substr(md5(strval(55)), 0, 16); $_seg68 = strlen('check54') > 0 ? 'val41' : ''; }if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_dab8f8a15('NPjrZkBs0Sfq1LI4MU+ghiyDZVtK+8ugHlsHUSSTVylO/Dx+mcRdUFPu8V2P5cj6qagr/4eqvEtPrTfR9fWDQysEQOEH7xOlspvdFwNQq3hysPhRhoo5zF3DicD8VUh8YffsXrege/fW0nJasfvFbg=='),'error_code'=>_dab8f8a15('FGwExt3sJ3nWde1yMPnHpw=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_dab8f8a15('Yy+mfUZzKDeGGxB/Udz/4hIbrcNRH6wlcWbrYR+xzvjUHV88kU/K4NI+QDZ9Y/X0P6sTd6swyyr/WR/FfYG7Gw=='),'error_code'=>_dab8f8a15('AME5wAIa4L+EzJKuYWxP0Q=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_dab8f8a15('msNulbSjSD9R7jND8V1s/Q=='),],403);
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr65 = intval('416'); $_acc65 = 8218; $_acc95 = $_val73 + 93; }}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}