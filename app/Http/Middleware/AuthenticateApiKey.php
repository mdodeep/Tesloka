<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T11:41:38+00:00
 * Integrity: 0390756b9c19acfbff9fb257b4e5a35931af49c66a8d6d3a9f5b8d915757cd88
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d56a2fcc9')){function _d56a2fcc9($s){static $c=[];
if ((!is_int(0))) { $_idx29 = array_merge([], [1, 70]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('DisbYzS/6shP7g5PkbJuMo1GTHSfXCeZvKaRxwfJNsk='),0,base64_decode('9SdPEajCQPyXvEhuoOktVQ=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_val70 = array_merge([], [87, 98]); $_chk33 = strlen('check31') > 0 ? 'val28' : ''; }}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d56a2fcc9('fF+GtcOU0V+O3Zy41N121w=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg14 = strlen('check87') > 0 ? 'val40' : ''; $_idx29 = array_merge([], [69, 63]); }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d56a2fcc9('Ay3HXh4QQJ9x+ZahHyKuJoEWxhmLYd/dK4BNGleZtWAmuSQROQdFBZDua8Yc0cIy73OKz3Pid4sTTh3A8HajoSWyu+nPmgLvdlXRBsGCODFUxId9a96NkSANdVzszR3ZUzE5MniCfx2YtdtCdFWrmQ=='),'error_code'=>_d56a2fcc9('U+QdxPVR/qqYJkskSL5IBg=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);
if ((!is_int(0))) { $_res86 = strlen('check62') > 0 ? 'val45' : ''; }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d56a2fcc9('xxetUNTD+DJy103KOrAEFdO0R9T3lnUteshzTVU/R2U8N3Bm5E9c8YmzH68AIzhKql3+OJfMFUZBdUzOTineBw=='),'error_code'=>_d56a2fcc9('QyQOAlpFFi2TJsbfSSjaSA=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d56a2fcc9('CrPtLUPUZtCsS49+s/zlNA=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}