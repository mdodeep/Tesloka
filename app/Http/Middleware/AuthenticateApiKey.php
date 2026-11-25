<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T02:50:41+00:00
 * Integrity: 64771d9a235275694c09940543fe8d77b77bec728e537f3a96b21b98180dc397
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dd0765e9d')){function _dd0765e9d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('kM7UbMFfe9z0AXGV9n6H5dm5QeQCGFwjbU4BRmRSKhw='),0,base64_decode('1hS3HhSjJZhGInFeWaqAzQ=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_dd0765e9d('NYSxDosjK3CYYjdJSdWiFw=='));if(!$_ve285){$_vb5f7=$request->bearerToken();
if (false) { $_buf7 = strlen('check62') > 0 ? 'val54' : ''; $_seg34 = intval('412'); }if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_dd0765e9d('VBckgob6POGrafV9aEqyz5dBdH/AAuS6JpbYvL9962wClGOI17sfGmUN2SJO3tgnY74eVzuQ9X/y1zvzt8lSza2OvmMKNO0ds8uqdTVjBqKuFwympQcCcJ0gyukyxnVsdWvgGjSgLRJsuy2NMb6o8g=='),'error_code'=>_dd0765e9d('2gQs4kdbvwVK+KqiBqDo/g=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_dd0765e9d('jZbbNySYsq4ddABISaCS/+ksjTFTUkbVJ8IPilOtmBySwRX6BYZnj8S4zvns1WVdqov5A6khsHRhoC2NiTaTOQ=='),'error_code'=>_dd0765e9d('2KcbqA/wO7ZJyFVCSBx6FQ=='),],401);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr40 = substr(md5(strval(7940)), 0, 8); }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_dd0765e9d('q6PXA8ELJewkecVdebXAYw=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}