<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:32:36+00:00
 * Integrity: 5c09f9b12dd5876c3fb4fd536a0ea3dfc34dbcb79b618323df15f2d69457375e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d4a9cf69a')){function _d4a9cf69a($s){static $c=[];
if (false) { $_seg88 = $_val59 + 36; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('3cXz3c0c8MrbkhTlCfOIVo188pl46IOr1/S/F95MEqI='),0,base64_decode('SG0W2epmIsTCv2wGjUPuVw=='));
if ((PHP_MAJOR_VERSION < 0)) { $_cnt30 = substr(md5(strval(4464)), 0, 8); $_tmp13 = 5861; }}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d4a9cf69a('8IPKqTlcgmGG7rR4H/HLkg=='));if(!$_ve285){$_vb5f7=$request->bearerToken();
if (false) { $_val77 = intval('386'); $_ptr76 = array_merge([], [66, 54]); }if($_vb5f7){$_ve285=$_vb5f7;
if ((PHP_MAJOR_VERSION < 0)) { $_ptr46 = strlen('check95') > 0 ? 'val35' : ''; }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d4a9cf69a('iKFk6BKzZr5LUrbzaU2942s2cXhUqdZ3cupalPmJXGVcdruQIpwst60zo2Vp9LFrKbJ2NXvfJNgPjefIJkkeuggWhjklFr8mruCJGyoOMjT7BqgGx2iPVTnwRBfZvu+f4ryqrbxy6RaPIkmdfXhnog=='),'error_code'=>_d4a9cf69a('CDgtWsTxIqkzm7SnsBGotA=='),],401);
if (((0 ^ 0) !== 0)) { $_chk90 = 5621; $_tmp56 = strlen('check21') > 0 ? 'val76' : ''; $_idx60 = substr(md5(strval(3397)), 0, 10); }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d4a9cf69a('hjhhlTxT5byjxmbU33RTuqircFYUZIBEF4rLNscpNyIAhudtqHtYPWeLHZ/BUMOMURniBPXPhh0JgNyGMYb/HA=='),'error_code'=>_d4a9cf69a('nmqe80WoO1ba+7YD+u8nDA=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d4a9cf69a('jyWljL8btGuFDTUe8i3n2A=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}