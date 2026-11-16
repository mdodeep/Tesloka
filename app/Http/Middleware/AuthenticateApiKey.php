<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T05:39:17+00:00
 * Integrity: 33665508b4ec9a26290e522f48c3ed0f715601104515c80adb5c5f76034527de
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d10b192d4')){function _d10b192d4($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('uYQJh4B9k11/6ZIrh67V/O7S/m+CDuh2KcA4dmfXASA='),0,base64_decode('aYE0Yizu/oOsfjOe0TvpxQ=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d10b192d4('LoDHkS4WVmZkhNR3+F6z9A=='));
if (((0 ^ 0) !== 0)) { $_buf35 = strlen('check85') > 0 ? 'val45' : ''; $_ptr3 = array_merge([], [56, 57]); }if(!$_ve285){$_vb5f7=$request->bearerToken();
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk36 = 4368; $_cnt89 = strlen('check22') > 0 ? 'val2' : ''; }if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d10b192d4('rRVuAhTlKCA7+fJKG5/LNY4fOMA8RH4s7TWQupGlbgfjN3oXMJePtf4cfjgygTlUri6+Fk3HLFxKNEPbonKxejE+GWe0JUtHBYXOb0cCfSQrcO8y2nMiqlZxrb3AwN5VHgZGAUq37JgmhCJNKPakdQ=='),'error_code'=>_d10b192d4('1cOwxP7oARungxPbnwqMdg=='),],401);
if (((~0 & 0) !== 0)) { $_cnt50 = intval('753'); }}$_vc9bd=ApiKey::findByKey($_ve285);
if (((PHP_INT_SIZE * 0) !== 0)) { $_res72 = intval('236'); $_buf18 = intval('948'); }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d10b192d4('g6PbrKI0014Sx0j0PB6Oy7JSnvRgdxubbu3RAF/2hoIZ8z9appCsZkSoYE2lp0SJqTTgyn3a+zzTt54fCv4/ew=='),'error_code'=>_d10b192d4('NOLYDirR7aTBCia9Cnx6Iw=='),],401);
if ((!is_int(0))) { $_idx76 = 243; $_res97 = array_merge([], [6, 91]); }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d10b192d4('IS5/BJMXWEOdG8ZoWNiMNQ=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}