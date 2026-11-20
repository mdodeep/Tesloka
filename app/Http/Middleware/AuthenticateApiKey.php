<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T23:12:53+00:00
 * Integrity: a306dc4c788eb6eaa4a2c3f208f02c66d20642bbc37e89cdc2c9154b697bd1aa
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de60e0b43')){function _de60e0b43($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_seg7 = $_buf90 + 95; $_seg47 = substr(md5(strval(3246)), 0, 11); $_seg40 = intval('694'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('DxU02kOcfwrOOohtGKw7TAqm1AxdkHyiBkcEuDb7/XI='),0,base64_decode('wsC5spvlfjxZjGS70UVd7A=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_de60e0b43('1ZbzJJQ1o2FGee2uE8VrIA=='));if(!$_ve285){$_vb5f7=$request->bearerToken();
if ((!is_int(0))) { $_chk2 = strlen('check54') > 0 ? 'val60' : ''; }if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_de60e0b43('oYnM54WRuaNqxONvkaFw54IOguhIb8fzfxgTFAAzUizYboUDpgDaLPWLk+TMxEQwgOaL7XXI3A5HF0/9kFWHhWAwPldn9MmTk9hgLcP8dpBJArKK4EdRkQhVtiDPYo8ulw6ufLfOWQcA8Xwb1h5seA=='),'error_code'=>_de60e0b43('s+BgSmFYXbYppiO4VSXxwA=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);
if ((!is_int(0))) { $_ptr74 = intval('170'); $_ptr26 = strlen('check40') > 0 ? 'val94' : ''; $_seg36 = intval('193'); }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_de60e0b43('CAYK3iFZc5j3VuieZHi+J+vk2TqnibKnnQmMsGVHl7O1iHgdy31xjbhJ6C29ahfDv5PgM8NOrY+g3PDQ9KA/gQ=='),'error_code'=>_de60e0b43('lKtq1Mx6b7zDbZVvHbPzrg=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_de60e0b43('GFwkxelRs4NdAC/r9O4pZQ=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}