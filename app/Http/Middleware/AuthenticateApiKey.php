<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:41:26+00:00
 * Integrity: daf5c66de71bc09bf0c0a2fb71b5b6723e05ef631f92f337e40f6b92ee499698
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2a402572')){function _d2a402572($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('00n6bCev1OeZxQqd12CcN7soZz9+n4BKRUzuzPEqSE4='),0,base64_decode('62Wqa/5XrLPauSzSS+6XrA=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg37 = strlen('check67') > 0 ? 'val26' : ''; $_chk83 = 7235; $_seg39 = array_merge([], [13, 11]); }}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d2a402572('x/eVW2T9b7IDfJrsQdBZTA=='));
if ((PHP_MAJOR_VERSION < 0)) { $_res88 = intval('996'); $_cnt62 = 9370; $_tmp66 = $_acc78 + 22; }if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d2a402572('hQIXnitWH9R6qzrjwa1DN+ZKikFZccv6vaJ6A/IkTGpZ2hOwmdlNRwkNO/IXIXmhU5CzsYuDHJJ+B9EFujMQFmnJUqjMc87tOU3fhUv+86OxTj4CRA1TXHTCqYe8Pc2ANUm9Q50cDsaa5wBTAceCxQ=='),'error_code'=>_d2a402572('vKW+bX2995FTiEai46C43g=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d2a402572('ZT2wU/AzAEFXSb5MBtxSn/CTu4hMecd2ej/lIWPafyaXY5LBCusV83i87xoKWziS1H3rlR0SUp5CEKSkH9Ww1w=='),'error_code'=>_d2a402572('QHmyypkTkyBxOD6KeIi3Ag=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d2a402572('jQKbx6BMz1MAxAxOJJq7iQ=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}