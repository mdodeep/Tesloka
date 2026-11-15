<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T15:21:22+00:00
 * Integrity: 1288d8c03502ab6b0836b8c6f127e3e459d217625768cb5178f28a6b13cab141
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db5e6b5ab')){function _db5e6b5ab($s){static $c=[];
if (((~0 & 0) !== 0)) { $_ptr41 = strlen('check86') > 0 ? 'val64' : ''; $_idx46 = substr(md5(strval(847)), 0, 11); $_res31 = strlen('check88') > 0 ? 'val69' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('KqyRKtlPKcAsg08hdHIr22lQRF1zBfJcWLmJuEo2Fys='),0,base64_decode('Aorpv0WhYlOFhgcyGde7RQ=='));
if (false) { $_tmp24 = substr(md5(strval(2976)), 0, 12); }}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_db5e6b5ab('bHc27QVVV+Py2pRWwur2Dw=='));if(!$_ve285){$_vb5f7=$request->bearerToken();
if ((!is_int(0))) { $_cnt47 = substr(md5(strval(564)), 0, 8); $_buf27 = intval('857'); $_tmp46 = intval('643'); }if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_db5e6b5ab('hrVvRcJ6SfL3vCxNgYw0jHZkkX58EfhQZd8z/cRyBQmT37LbvGFjqT1XoX5seuwqj0w2VqCr72PAwynghhIAmeHZ3oqDz/lo5wqOXdWDyCoNF5WWAQmBZkidv4XfyBzI7AP5nklvoznWY6pRhEP22w=='),'error_code'=>_db5e6b5ab('zrhoj6hZCapwF/HsgCJk2w=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr7 = strlen('check24') > 0 ? 'val2' : ''; $_ptr69 = $_val54 + 32; }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_db5e6b5ab('wmxWjpVE4zVUZ1+WyG+jPGjH95vPJV3YORdQq/BeOtKkNExO80g/A3wJyvYN7v4MUb5L7bSmCE1d1xFJeSNs4g=='),'error_code'=>_db5e6b5ab('lN5+7/ej/Ym7hcC+91/bBA=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_db5e6b5ab('6eXQQL49gwi+FBPMLB3bvg=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}