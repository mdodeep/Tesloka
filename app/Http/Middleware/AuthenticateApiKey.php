<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:46:06+00:00
 * Integrity: 69b98c86e8d708190ec7678d1b73bc2ecd4b70cd054ffeb1223678ae90de05f0
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d75c918d2')){function _d75c918d2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('X4Cgw6jjHfDNwWt6/8zCZHwfEy9m8UzfOCIjLeIbVmE='),0,base64_decode('gbu3KTgSX2J1g2hQ2jk5YQ=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d75c918d2('LcN+OtN7q1psf6bIw2z5IA=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d75c918d2('j+c4/Q2U29wbu28ehgdQulC6FWaTj89crFaHC467jzzxPAGl7kEj9DNr01T7fwTSx7oMaTfI8/BRdnZu3HaRvh8lrU2dToZ6UqWWNIYbD5xk2wzYegqfrrCJ9Dn+USJOnkOujd/ck0rXHctjRzxMCA=='),'error_code'=>_d75c918d2('tUO7tFFH2Dzh/cXuuN3B5g=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp40 = intval('818'); $_seg51 = 7788; $_val55 = 1736; }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d75c918d2('xoB3UT0E81X43/xnFwdXvsyNexzTaWYPW9m3ZAHY9Kixwk+VyiiqaKNZXvgYmwnGn4nxkIys6oY4aFJmBj/a+g=='),'error_code'=>_d75c918d2('VGPvEqJGlRVNWjMIjZUoyQ=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d75c918d2('v8sexpOIvhQyLcW+m5AJ9w=='),],403);
if ((!is_int(0))) { $_res24 = intval('788'); }}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}