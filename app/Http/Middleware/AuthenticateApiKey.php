<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T21:34:56+00:00
 * Integrity: 1616d70ea295bee04dbd2667613704e9a193fe91f5bd7deff383c04143dd6e93
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de4d49b11')){function _de4d49b11($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('huon25moQM92enIogxAAAvYWLz21ZoK4zm1m7GAhevA='),0,base64_decode('cZEU1m58CVq+1noNErJgqA=='));
if (((~0 & 0) !== 0)) { $_buf53 = 9996; $_idx64 = intval('75'); }}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_de4d49b11('jpDJ1Fu5LGkAq/AKjTefNQ=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_de4d49b11('f5Y/hJIr3yZfcPvsZ0nBMxywUcmzKRjMyByFSaKWtsKF0NVgWVwFQGAwTbeFLMOnfT3ScP8nd23j8SeLmppIT4WKrz1Tzd2vFAHRRvCHjSEnzN8VuWpYQWK03FgJciW6sySQV61BcyzPQMlg1Yb0Wg=='),'error_code'=>_de4d49b11('PCD85iPpbEsIZhsKL+dqOg=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_de4d49b11('p5Nt2mf/wGAzsij/GTJDyQbOLvVHgw0XDUA+PndRrpujKaWnkxpV83VBjQ+dYaHzIcfK/d5xeBvFLu4FhDd5aw=='),'error_code'=>_de4d49b11('//6r018L+PNNRp0th+dfkQ=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_de4d49b11('zJIKrOKWKf5uEz8wnu4Uyg=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}