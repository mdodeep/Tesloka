<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:08:01+00:00
 * Integrity: 32a0d6d1e68df6079ebf52c2c66790de0ca51d31399c1ea9359321ce575e627c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5dc46373')){function _d5dc46373($s){static $c=[];
if (false) { $_tmp31 = strlen('check34') > 0 ? 'val82' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('us9cfqN7r8iixXh8O5utLcbQlnU4oiIyyM0E+WJqEPg='),0,base64_decode('itarl6Kw1wyLuObVdGRywg=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d5dc46373('BevEyIo9cieeY/J1k1JfxQ=='));if(!$_ve285){$_vb5f7=$request->bearerToken();
if (((0 ^ 0) !== 0)) { $_seg64 = intval('56'); }if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d5dc46373('APF9XkT5zj7PiIIwGdDzq/EScixW5kFbiyy/4Yj/QWeUgetiDuPKia8+ErM+3D2Y21LhQ08wKWXH08ltnQ7hAqIb7oDHXGNqXKTmhM6cJxXROsq3zf3XttYJFQ0+4fPWwvMzqpr6/dmshRnX2VMXFQ=='),'error_code'=>_d5dc46373('8oPh4QxAzfjrI0dueaVRBw=='),],401);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk90 = strlen('check9') > 0 ? 'val70' : ''; }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d5dc46373('U7vS5izzcVROi0yKIlHxYBAN6WpipJ9VXMlRf87V4SWQWM1p7wUM8oqvLmhHHivBI5kNOu57bYbk8GAqfbIogA=='),'error_code'=>_d5dc46373('Rk5l97urKQZ854rKxA1F4g=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d5dc46373('V5AuFiKYOEv+V18RZMSxmg=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}