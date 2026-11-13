<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T16:55:48+00:00
 * Integrity: 40a7628a067f020e4fd2c57f4a5841387dc6e2eb74ae871d3629e6fddb576e35
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d488976ec')){function _d488976ec($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc80 = 8355; $_ptr0 = intval('89'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('OMyIZRgUyUc/Tv4QqNLgueLtGw0A5DWOXOTwjDnVWQs='),0,base64_decode('B3fYhcdOHKsnTYw2jPgb8Q=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d488976ec('DGie/7SNtifJa4pNFEm66A=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d488976ec('eH+F8y5DFIgPyvSKnT9noNj5Lf+JrJqvB8kB05AHlOxdPCfbCCkYlfKD/l8YBG6k/B9/OI03YreCVI1nZaxZQyf55rExBROKLsQyjNhh2Envg3+7aEjY40+Ue2dxhLnLSbNnY+7C6cs5MYRHmKEuSw=='),'error_code'=>_d488976ec('hF9Z6YjqIzjn0fEScCZOfw=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d488976ec('3whrnKiwgyVtfCMyOuCgUXqR21V+87Os8Afebw50GiItW3L3C6UpDMUoMa82yue7371b7O0q8+jo1J605bfGpw=='),'error_code'=>_d488976ec('JcY48Ryt0J1F6eeC/qQrXA=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d488976ec('lPVOZcmfo5GRv1m3tiwG5g=='),],403);
if (((~0 & 0) !== 0)) { $_seg60 = strlen('check26') > 0 ? 'val89' : ''; }}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}