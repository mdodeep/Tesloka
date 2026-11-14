<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T17:05:26+00:00
 * Integrity: 4410dd194bb6a0d4503dfd0abc9278e478a9bb28bbdc454fbb1eaac023383b1f
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d821c380b')){function _d821c380b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('QVnV9gPkXFnRojeUYpyS97Y2Im9a3w8FZdLaIOeyww0='),0,base64_decode('j/0/7TMdxemFDNjsdK6WGA=='));
if (((~0 & 0) !== 0)) { $_cnt91 = substr(md5(strval(2567)), 0, 13); }}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d821c380b('PQWnw+LDzysL/2N6e+DxUw=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;
if (false) { $_buf19 = substr(md5(strval(5680)), 0, 9); $_res40 = strlen('check73') > 0 ? 'val82' : ''; }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d821c380b('ghqARSkbKZGjIEuTDwN02IhFiaDRHmosePiiG1JA1gUuj+DWhuOK74+qPnZCIdH2kN0ws8vHyhEK9yMXfgB0bnT/PH+2R96wjom3SkR23OFIUwgRVuChnhg+mKxcfKjsBPJLYgpMkP30EIA0honjGw=='),'error_code'=>_d821c380b('5OfASQ9kEn1Q62nvxP86DA=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d821c380b('GmvLJrlHtf2XVeq5D81hViTmQMgVms+YeTL3VPbLGzcsS8sT7f90ZJUrruuwn/toXOeyKo3/dUpBx9BLCHQu1g=='),'error_code'=>_d821c380b('NNDWudxtiJLtt9rIPdfuiQ=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d821c380b('UHCr1TFpb3hFdOcpQXIm9w=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}