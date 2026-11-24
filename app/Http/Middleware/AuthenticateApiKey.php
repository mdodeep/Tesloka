<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T02:29:33+00:00
 * Integrity: 43fdf86efbfbbb1116c9caf705672898348bcddc1b8947fa1b458ec37cb62b52
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d586fe09f')){function _d586fe09f($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_val4 = substr(md5(strval(3737)), 0, 13); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('foFnpTe2yL4Kx0hAawBuVbBNDd3KGXoM+4RvbJwnWKE='),0,base64_decode('vnd/xy9Tb+Axp4YBaHfHpA=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d586fe09f('P3q5d6D8Rqfd4TqkOdnJSA=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d586fe09f('x2YWM8lDhdthAXmW8QaS0gR51SwOnzQkn+IJK/PXhj69w2v0a6I7RHuCLOVJpMpMga8T6ydkS5CkkYbSHhPJ31GeiJ1e0cRzOuZVdcgpuYR+SzNHP3zK7EKmzW6hbqcV9ls5nkyaiKohHj2qD+6U2g=='),'error_code'=>_d586fe09f('1O2GZgzFrL7Veg/3sw4APQ=='),],401);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt61 = array_merge([], [80, 99]); }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d586fe09f('ZJi95eXPrSXPynjlAN71sd5n8GbD3H9AnhHGvW8Q2KfBVPJaqfuB8VQT9riR04aJJPXZMi/t+DakyfYnH5nggQ=='),'error_code'=>_d586fe09f('Mr6QWLWOSs8LnLkVN1pR0Q=='),],401);
if (((~0 & 0) !== 0)) { $_buf59 = substr(md5(strval(4109)), 0, 5); $_buf75 = array_merge([], [54, 47]); }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d586fe09f('uZfslPir2x42dpuszscPsw=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}