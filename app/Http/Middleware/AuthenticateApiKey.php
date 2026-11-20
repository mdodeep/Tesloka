<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T21:25:48+00:00
 * Integrity: bc2d19b46f670e638cfa7703c51ce0f13b713389932df83ebe3e8b3858e1fabd
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de85f1902')){function _de85f1902($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('kDmC+cKE0MvKBwQfRKxtYkSTaE/21RiYfOwYYWj6n/A='),0,base64_decode('PvD/b57gLt1hPancn1/Ekw=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_de85f1902('gjHvLpLYdoe+PQ5UtDYlgA=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;
if (((PHP_INT_SIZE * 0) !== 0)) { $_res48 = intval('14'); $_tmp34 = $_tmp99 + 74; $_seg97 = strlen('check27') > 0 ? 'val57' : ''; }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_de85f1902('A+cqbK1Lb2QpJjb2hO1jfwZdtnoum26TQvVgXpbpfm6UlrySKtqy7ASfixqKrOfBctrd9K4ZZWK0bIZj9woXoOXxq7uPV1f0rOT9yK3up7qrb8No22UWnYiXbnIivTDF3RtXY/HaXFk30pWRtspi5w=='),'error_code'=>_de85f1902('jT0dtE93BTjhPibRwp7WEg=='),],401);
if (false) { $_ptr60 = substr(md5(strval(3646)), 0, 9); }}$_vc9bd=ApiKey::findByKey($_ve285);
if ((!is_int(0))) { $_idx88 = strlen('check82') > 0 ? 'val20' : ''; $_res41 = strlen('check84') > 0 ? 'val88' : ''; }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_de85f1902('t4yyxaovF/oVZoDMEHXohEbRibgHNoDhPPAymizc/rtSUBh+AYP93TT0J2cOMwuvjhzcvHFv0zhPDiKjBGXq8g=='),'error_code'=>_de85f1902('9amoaNAQ+5AqiycxuunmiA=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_de85f1902('3iYdqiyb0aBUTrGRQ5lDxQ=='),],403);
if (((~0 & 0) !== 0)) { $_buf97 = array_merge([], [52, 84]); $_buf47 = intval('644'); $_cnt23 = strlen('check53') > 0 ? 'val49' : ''; }}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}