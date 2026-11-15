<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:46:01+00:00
 * Integrity: e8b7360e754ddbca48c6d0f033057497835a6312b125fdc59f0063da2ae89ad8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d8f2a2695')){function _d8f2a2695($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('oUYg7x7YHZWzR+PgsR1s0yWI+AmwhSBqBOoTwtgcgGg='),0,base64_decode('7rKPkSQKSv4vBGS/282+QA=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d8f2a2695('Wdj7IYAZFL+TiDQ5tCM19w=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d8f2a2695('6bRsz6pRMKlT7W4hIVsdoZ9qsJ6FlNU9PLErVU76JFH/kGUHS28hOaj+ronjWVLk3j/tORmhBE5eOaU1flOnMHJslif5gdOIOnMG8Xj94J9wQM99bbzyV4UYyJwu6uZCdxZLUOpSD95933MuZtDuIA=='),'error_code'=>_d8f2a2695('wl4twwSk6wb4O2kjyILVfA=='),],401);
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr91 = intval('217'); }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d8f2a2695('C6O6VctUINlTdpr1vMg0sA4HkYu0+2uOPCHqgKXIRM6Yh5kwiVFAaxdhRu7qYd3tOeEaa1vajQWuVRBjMXOxCA=='),'error_code'=>_d8f2a2695('DJBIsd0BEZGATQ+CahlUtg=='),],401);
if (((~0 & 0) !== 0)) { $_idx48 = $_ptr67 + 69; }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d8f2a2695('aRkiRKkqC/NAqfE34qffSw=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}