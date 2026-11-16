<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T00:47:05+00:00
 * Integrity: 2c081de88a09f26010759678eeb0fac06b7152875c6795cfafe5f71b9709c5da
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d48fa5e39')){function _d48fa5e39($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('T9lheg3W+VpiC7OpM4JtILfw2IFGoxppq8BMKLaNKh4='),0,base64_decode('ucltUX9qOOSEmubgUGpK3g=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d48fa5e39('gCfN7QEE1UYYBNnwWHwL+A=='));if(!$_ve285){$_vb5f7=$request->bearerToken();
if (((~0 & 0) !== 0)) { $_chk64 = $_acc72 + 53; }if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d48fa5e39('TJ+N2zI1+moGp5C2oei6JECGadD7j2pTGTOgsfkjUg83e/822tKHaJAAS4JA/lo7hTxpx1Jb8p85GdmA1YhrkljpG3TM7YJ40XsvC/KVfFJaP3eEKt37Q33LbOnZQMfhZf9YNx/oKIzYChH+4SRekQ=='),'error_code'=>_d48fa5e39('RdEpotzROcxDlyjg+U2Rjg=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d48fa5e39('Lmm6vzgXTtC6L4K7nqdSlHpNbymiIv6v9on9SwN6SpFgr7JbFnU+MI+s27LA6a2qqeMBJ1B40Uffrie7cbkQdQ=='),'error_code'=>_d48fa5e39('4OAwBYQURrValpAMRuv7Aw=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d48fa5e39('Rpz9/XNYZXnMpZ0T3YzLcw=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}