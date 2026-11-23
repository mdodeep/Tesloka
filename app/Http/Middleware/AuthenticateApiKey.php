<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T03:17:55+00:00
 * Integrity: bdeaf86c3382669bdfea6ebf51d5418a6e22948d723c091cf74131355cf40149
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d3a7d1ea5')){function _d3a7d1ea5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Xh8v+zbO0Dg5bZ2nZ+Mp3QVeiuptgRAPgbiZMAEsL6k='),0,base64_decode('V8t+d2JcRDlfD+ICWRdzgw=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d3a7d1ea5('yJ+TGybmhlKni8ysXbnZnw=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;
if (((~0 & 0) !== 0)) { $_seg41 = strlen('check87') > 0 ? 'val58' : ''; }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d3a7d1ea5('S0eI/I2UYU5ERYZbeK0L9G6j6nxMNtaxCWuLEkPvL2wZehIj+1FSbZ76HGmBLCO5Fx65eYNMnueNFExRL4LpjG3IN+qT4469DqiBueKYcjEce+XXXPsgA955Vyta/RfCi4GXDMMLQ/YCvdKOTfJ5jA=='),'error_code'=>_d3a7d1ea5('3iv7uyZ93Ira12igAgyXPg=='),],401);
if ((!is_int(0))) { $_acc46 = array_merge([], [8, 16]); $_buf75 = strlen('check35') > 0 ? 'val40' : ''; }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d3a7d1ea5('bHdNBccTkFzDPacxjcB1LlENWJWzG/O9s0ZVnICkn0YbWa1irZK5EGPFi/L/h3nanbHsiVq+llN99aOqtVWWMA=='),'error_code'=>_d3a7d1ea5('nFtGji4oxVaNiKCbW+0rRQ=='),],401);
if (((~0 & 0) !== 0)) { $_tmp62 = intval('189'); $_res70 = substr(md5(strval(516)), 0, 6); $_ptr53 = array_merge([], [95, 49]); }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d3a7d1ea5('Yi5pVXkNWt0BADgqau6YZQ=='),],403);
if (((0 ^ 0) !== 0)) { $_cnt58 = substr(md5(strval(967)), 0, 10); $_res0 = 7517; $_res51 = intval('412'); }}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}