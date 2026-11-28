<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:03:23+00:00
 * Integrity: bb5e2d4dc002ca16e352f94dec9ff1b22a235be0f9eaf548fb64c7f0cb8d46b8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de637ed1b')){function _de637ed1b($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx44 = intval('924'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('jPKo9rkHUjcM7rGnmycl0b5GwTLZKidg1B/y4UroBJ0='),0,base64_decode('xPQ0QfLDmfp9tneymXhDRg=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_de637ed1b('r9e7480k3d5Kondq40sqCA=='));if(!$_ve285){$_vb5f7=$request->bearerToken();
if ((!is_int(0))) { $_acc22 = $_val97 + 48; $_ptr83 = intval('507'); }if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_de637ed1b('yGoxpHCIhOZrYVeBbDIsO/wP5vK0OMMEBoMugTzRXVepoIubZn+t6o1UsTgxAMK96OVKbZYPbpUS20FBDloMYbYKqFmulQsTGDa0c6m/fdl/2z2s4AT3Zjk7YkVXr9BTt+9poQysVGBl1go2UnGQsA=='),'error_code'=>_de637ed1b('HtM0avTEBdvRfQ73GVC2lA=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_de637ed1b('XExe1NVQGDGRLUE5SZIJpcx3t/QFMKc4/VgbdYwjT2R/e/q1rdcyFAHPq8w3i+3VGGJGa5lVhV4j1Ns5eOooBA=='),'error_code'=>_de637ed1b('oFRrw3bQDAokmsEiZkIFVQ=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_de637ed1b('VLqdSlwR4Xx84jzWkgFyBA=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}