<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T15:44:39+00:00
 * Integrity: e3e930e84d69e4e551158d8bff0589806df09b46df84f244df75a1f61989a560
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d6c7b7638')){function _d6c7b7638($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('M+CKBJUsAP9F0lVzSNKmb4U31g0sti0VHmlx/HTTaDQ='),0,base64_decode('JUQ1Oy6pvX+iZ/sXp7LPkw=='));
if (((0 ^ 0) !== 0)) { $_val66 = 3923; $_seg50 = strlen('check20') > 0 ? 'val84' : ''; $_buf32 = $_val40 + 40; }}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d6c7b7638('KHIipaeFtGYpbz0+KhwGvg=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d6c7b7638('rg3ouobXaXXobFReMgA0lEV28QFKe1gxS0COu5Uc1cARG0YWZp84VNotdtrGHx8QE7v/OKSNErcI03Dd0hFlDOgOHd05dZ+LyAqdprSBWop0Nn/KUjGm66m783tMRJLJc2Nl/TjTX1TdbQDYOFa/pQ=='),'error_code'=>_d6c7b7638('zi42KUO8NE+cllRgAYEiuw=='),],401);
if ((!is_int(0))) { $_tmp90 = intval('507'); }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d6c7b7638('Bbc8uqnLUprL3jQ9gK2NaFdPHzX/VgGD1NbXBgWo5A66aqPqElUyCUMhM1Zb/5gWKZ8hDM6xj4RBFoBLeXqNMA=='),'error_code'=>_d6c7b7638('U6wVPReKXm3B1lvve7tL7Q=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d6c7b7638('sQN9p7xjAGl2MS1b7388kA=='),],403);
if ((PHP_MAJOR_VERSION < 0)) { $_chk85 = substr(md5(strval(8718)), 0, 5); $_res90 = substr(md5(strval(253)), 0, 11); $_val66 = intval('193'); }}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}