<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:52:39+00:00
 * Integrity: 2474375cdffefca3312fed197f4d5978af35cf7ce2041d9337b6c641bbaffc53
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df0d7f140')){function _df0d7f140($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('xcZtm2w/KcKiqOOqmmwdKet2gLIqbkfSQ8NQpsn74f4='),0,base64_decode('4rH8HdVVNQdtUjkmCTYaBA=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_df0d7f140('yle6bZjbJ0kvxKWyyz0kTA=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;
if (false) { $_acc15 = 1613; }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_df0d7f140('1AOTBu6i27eK8l6ufXWwiRdulytXORY439tJ88tWdASqm1elrz13/85gx/jfaE7tLegLGWxkhXcVa8GIlOkTRbArWnFhwI0ZlaogVGfegFhip52mwiGbqfNydIB8ZBWpj9wSu+c0a2Zf+iP7a5ab0w=='),'error_code'=>_df0d7f140('6UIsCqtbbIq94TBaOLhjXw=='),],401);
if (false) { $_seg24 = 5270; $_chk56 = strlen('check64') > 0 ? 'val86' : ''; $_ptr56 = array_merge([], [0, 1]); }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_df0d7f140('bvwnaHN8VNAdqsFE5MRHqUAE77rnZNAVwZ34y9k+xzCdxwPhy5AXDzfbVnp2NJfLDX+h46pjSvf+8gA+9O3HkA=='),'error_code'=>_df0d7f140('Ue0PhGW+JaUPKv1ROfvyRA=='),],401);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp34 = intval('139'); $_cnt44 = substr(md5(strval(5313)), 0, 11); $_idx81 = $_val41 + 99; }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_df0d7f140('SlYxY88UmQRfAGmQnRXpIQ=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}