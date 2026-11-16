<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T09:06:07+00:00
 * Integrity: 97253e7a138b8dfc29cb91654dc1e219bfff6043bef9e78fea4f64e20462c2e9
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db3d5f7e2')){function _db3d5f7e2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('GD8fCtgq4dya/NXoavweXngx/X9Oxw4EdhHOHIcMhZc='),0,base64_decode('VRBPdFT+pyPc+gmpXEMqLg=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_db3d5f7e2('n3kinJXJCR6X5IvSjaYbjw=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_db3d5f7e2('I4wrogZRK+ElGctk07GaD6d157SZfS2+aJFOAUl62Afg29un+6koNYvNATr5ARc+PnqA5tz/uIQ7Hdf6A1lwLlK0C8WXLxPQFBxRy+LllBG3cn6dYzS88qhhvS7DwCdPYbkTD81sM8vf48j/nrAhzw=='),'error_code'=>_db3d5f7e2('2e8TzQwiWuYvmdSvlNYvFA=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);
if (((0 ^ 0) !== 0)) { $_res27 = strlen('check70') > 0 ? 'val84' : ''; $_val99 = $_val17 + 100; }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_db3d5f7e2('wP78hr0fZJOdhX3NBrotta/NcHM4wAEum2LAM8oT6doS0B4pH4Uz6E4p+5w0ch6mnSP9hIVeKRFsbmcOELSHkg=='),'error_code'=>_db3d5f7e2('Z7SxU3s04sPASq82pTJyIA=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_db3d5f7e2('o9l+lDv8UYQnMuLXDyJlUg=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}