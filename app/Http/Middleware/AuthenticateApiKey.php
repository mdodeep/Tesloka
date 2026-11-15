<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:37:08+00:00
 * Integrity: 453f233f3fab52634ec2f18e0752b7d9c835945c007e1a04ea31d7efaf616c33
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_da5f86120')){function _da5f86120($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('z/M15A7uVK0qh/qYL2t8rUPhbo71+C05XJUT2iprw3c='),0,base64_decode('zcFfTnIFX7yl481MWlVHqQ=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_da5f86120('OEuhx/0Aa8WeC1TJDYkTng=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_da5f86120('Gu49FFzYXR2W9nFg/zMJL36G1rSSW3on1ptuNeBveJNmLV568CKQXQeo7ReLfkyk8lsKCbEBQRLPiCsZ6Rq2vCezq8RWBPlF9DdUK3GP5zNp6T04tJqGhGkToLvEdwdEoXIkPijjcZ2O2N9hKTPL3A=='),'error_code'=>_da5f86120('/AqysvBlV4mTYmNaI/Wqfg=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_da5f86120('pwFPc+aP2QLzfkw+1cYChqyRIjmgzzSXGA/UtNEEaCJRARPuKjkV8jBBWWWLNrZE3fZ8QJrNnLLmDqfToIk5Rg=='),'error_code'=>_da5f86120('L81RKShQawLtJhwLp/2htg=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_da5f86120('ZIH+NRv+MurTe8jI/7leRA=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}