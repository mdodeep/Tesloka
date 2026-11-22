<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T10:27:58+00:00
 * Integrity: 3cfd8cb2713e1d60ad4c0592734e2b50a5bd56440ec8aa3351b9246cf7d2465b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5bc3f501')){function _d5bc3f501($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('innonNi1RWjUvA+wAjP+N/Lf3sPp8XV63TnYzGjcipw='),0,base64_decode('tix3AiSpK22oP3ZB4MXoCw=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d5bc3f501('cocphTM2h0r/BIyXSx4cuQ=='));
if (false) { $_res27 = 1401; $_chk77 = intval('260'); $_ptr42 = strlen('check80') > 0 ? 'val99' : ''; }if(!$_ve285){$_vb5f7=$request->bearerToken();
if (false) { $_buf49 = $_cnt71 + 54; }if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d5bc3f501('qjr72i7M3RFBzHZn72dkw7Y9V2Le6zxuwyPlM1qtzWXRUQaO8nfAfCw1B80DcTw0IRFvQDUomP/rhybM/my1MqAV/ZFj4OgwE96rerplyh+KFw7ODgKHshLgpT6V1EGjXhpRuwFXm12UYYbhIxnJQQ=='),'error_code'=>_d5bc3f501('ZGCnGqsU2o7U9rXUWNMMHw=='),],401);
if (((~0 & 0) !== 0)) { $_acc9 = substr(md5(strval(4026)), 0, 11); $_idx26 = $_tmp86 + 64; $_buf49 = array_merge([], [94, 43]); }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d5bc3f501('NUHEOPfc63Whc41+rdG4pGoyFPoxxezqfQFgYNUSDUNRkAWed8ndtnnkx/mc+RaxECG3kAHzdIvc521g1W59Rg=='),'error_code'=>_d5bc3f501('DX1PVQa8lIR7UY/SanvMzg=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d5bc3f501('779dKcqcixEBnLUVnnkc6w=='),],403);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr35 = $_ptr61 + 63; }}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}