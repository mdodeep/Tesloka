<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T01:48:53+00:00
 * Integrity: 2b02e96a3b668b5091b70acb55324e853532ac96032889cccec9afa6dfd25cd0
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d97111aea')){function _d97111aea($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Nlkwr8rGkwOxsbQshgmUUE9SvyV9M7RjEihl/zXFcMY='),0,base64_decode('X/Pth1N8wJKPnN+bt6SDeg=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d97111aea('k/sjz5vDxtX2yUqb8P70Dw=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d97111aea('TgCZC3BN77kDW6/I2pxEbE2plXvEsJdnrd5A+hVq128rvC7ACmODYM5+Y7+kF/Av7HgpdEXj5Ov0B+RTXRjzqMn+QJoUZ5ofZRV23NzF7c0N2Wz6adw7zIpv+1NsLRfivdGZZ8XwM9adVPn4VwAu0A=='),'error_code'=>_d97111aea('DCh6zkQz4fEAYASyK1/pOg=='),],401);
if ((PHP_MAJOR_VERSION < 0)) { $_val50 = array_merge([], [12, 75]); $_tmp85 = $_val67 + 86; $_idx76 = substr(md5(strval(2372)), 0, 6); }}$_vc9bd=ApiKey::findByKey($_ve285);
if ((!is_int(0))) { $_acc65 = intval('322'); $_val63 = 774; $_buf7 = strlen('check48') > 0 ? 'val30' : ''; }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d97111aea('DCG/PnDEMO7X9Kb9pa6pTSfEGTkXKVGgLZlj/nb4Api9Ar5ZPO4i8B5VZHPncCeDiHP7cx0UuVAvDtFADObOnw=='),'error_code'=>_d97111aea('1L317kbx1KKhIBiPGfvmgw=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d97111aea('qHefD+1sJYRGCQNspXLSww=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}