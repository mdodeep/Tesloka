<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:21:26+00:00
 * Integrity: 8f90fb12585ba5433e80e954547474262d9a60cce968d861279d136af920b5bb
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d203634dd')){function _d203634dd($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('6zYzR+K2hzk4qPEWjTEIYDJ1ivlj/KuUAvL0MQnXYqs='),0,base64_decode('oao2e1ALOPPS9YeYdioAVQ=='));
if (((~0 & 0) !== 0)) { $_seg69 = substr(md5(strval(5363)), 0, 13); $_ptr48 = substr(md5(strval(3760)), 0, 15); $_acc81 = substr(md5(strval(7100)), 0, 7); }}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d203634dd('tsPdD8NbL44YFxAD3Mu/Mg=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;
if (((0 ^ 0) !== 0)) { $_buf5 = 5756; $_ptr76 = strlen('check48') > 0 ? 'val39' : ''; }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d203634dd('qqtkVzvRtTrrxdccHfQtUL40IGsHjpjxlaEUk+98lt3BfMDFYkFEvNvsL9CCPcHqbn7+qLUiU0p22KLXHNrhvItXx2LKrJUjaJDFZkzw57IcmMApOmmESCF0ispiaG6zQYAipiqeYoW9g8qMMO53ZA=='),'error_code'=>_d203634dd('y+d2fPWwD73mFqdEQChasw=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d203634dd('fg4iJJNAoFEgjcsi7rNbpjEXGEJSoEnSTYkQUshW0S4k8QnA5GRCF7Z9jaQhiFAPG8JDidFkp8GopAHr/ONE6w=='),'error_code'=>_d203634dd('OyS1kDBDD2vI1VNtTFGTWg=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d203634dd('heKttRADuje6kNZLLsN8kQ=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}