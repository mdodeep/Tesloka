<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:55:37+00:00
 * Integrity: 1e494954db31ea5015f15c78b54cb3ec28774dcf71dc04fa59ca18152ead1bdf
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_daf0aa6a9')){function _daf0aa6a9($s){static $c=[];
if (false) { $_acc8 = 6971; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('LZ61b7weg31493z4mh5PwHriS+RAuwaO8PKobZ95IdY='),0,base64_decode('Q1I3FqvNRvZzLhrK+lOCsQ=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_daf0aa6a9('9rJZ5i0gw/1Ab+D9nbfhVg=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;
if (((0 ^ 0) !== 0)) { $_res58 = intval('474'); $_acc40 = substr(md5(strval(6550)), 0, 6); }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_daf0aa6a9('7xVoXQL4jtvxvo/kA/W3QMZEbuZU5zkpdIiAJg/tlmxTg4PbrTYnFuWcwSESK94qGB+euFVyIaakMRNhbfA6RXpv+RsdVioNv2yRcLNpIoKQpOZVmgPkkT8qhw/v227gq9V3W2G5nfwp5UdRdos3Nw=='),'error_code'=>_daf0aa6a9('KS0BiMwJfzk9tMi/ewKwiQ=='),],401);
if ((!is_int(0))) { $_res58 = intval('123'); $_buf87 = $_res31 + 81; }}$_vc9bd=ApiKey::findByKey($_ve285);
if (false) { $_res29 = 3065; $_tmp52 = substr(md5(strval(9137)), 0, 6); $_buf30 = array_merge([], [35, 74]); }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_daf0aa6a9('0WJ7X2UMM+c/20l25uMK0Jks2O36hnyEKJUOu5qHi28JKfboDqp5s98h2/GfkFKSEt3pP67QQ+uPkHxS0FTdow=='),'error_code'=>_daf0aa6a9('/Ow09JqUf6j2fBUrKP3hYA=='),],401);
if (((~0 & 0) !== 0)) { $_val73 = strlen('check58') > 0 ? 'val35' : ''; $_chk22 = intval('833'); }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_daf0aa6a9('kAFBXM4WMK5cBz/3uTJLMA=='),],403);
if (((0 ^ 0) !== 0)) { $_val67 = 4494; $_buf84 = array_merge([], [91, 7]); $_tmp20 = strlen('check96') > 0 ? 'val92' : ''; }}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}