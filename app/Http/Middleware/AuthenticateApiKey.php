<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T13:06:37+00:00
 * Integrity: cf1490e0e40d44e80b28fdf590044dfef46bee366998158e0ab499e7710c3b23
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2f6b9e44')){function _d2f6b9e44($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('NUxDlJLHPQmmyn4dOp4RKxhQNJYECKElZfZKxYXNhvY='),0,base64_decode('cWFxs18hrTRIk+52CSDaiA=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d2f6b9e44('3z9f8wrBB4AeKuLxot0g/g=='));if(!$_ve285){$_vb5f7=$request->bearerToken();
if ((PHP_MAJOR_VERSION < 0)) { $_res53 = strlen('check35') > 0 ? 'val33' : ''; $_res79 = strlen('check67') > 0 ? 'val46' : ''; }if($_vb5f7){$_ve285=$_vb5f7;
if (((0 ^ 0) !== 0)) { $_idx88 = $_idx30 + 35; $_seg0 = intval('52'); }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d2f6b9e44('fqdXiY8cyVQOowkblkoJZ8JGGhoLX2jCEgcNb2tRtVKd4ZOlwchquJXiqqfbMzS++gEob4Qq/K1llNVOTSSuSnXZgDEXC4+Qk9cA1Tqs3L+ifXKr33hsGupsnAi0qFOHHH52fFiZMx5cVANKP7ar8w=='),'error_code'=>_d2f6b9e44('pQvFOye0QfG0yC+k/tPPMA=='),],401);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr98 = strlen('check86') > 0 ? 'val99' : ''; $_acc29 = intval('369'); $_val4 = substr(md5(strval(2163)), 0, 7); }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d2f6b9e44('nv4f7ISnl3a4kJ3dnsBC74HxFysf0Ho5togLbAeFLZ8uWE8zHN2skjuiCkixSF/6BMESbnqz5vbzClqNd7gqZw=='),'error_code'=>_d2f6b9e44('hXI3FV8KV+kxZmgZnUJOSA=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d2f6b9e44('b27C5KutAbtQ9nIT1n7S7Q=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}