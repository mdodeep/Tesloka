<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T16:16:51+00:00
 * Integrity: b673b20a2930094cebc22ad245023decb7a42598d258d4d6d8c4c6cb6524651e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d89d8b973')){function _d89d8b973($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('1STSsRH4RlfbrybreYMeeqlA4EbWwdLjVjDoZQoTyz8='),0,base64_decode('GieI/1MtUk9ATwEg7Qi36g=='));
if ((!is_int(0))) { $_idx1 = strlen('check4') > 0 ? 'val26' : ''; }}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d89d8b973('Friu6Jb3JyZMdu989Acp+Q=='));
if (false) { $_tmp10 = array_merge([], [30, 4]); }if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d89d8b973('6J58Uafy2n6NqmTmFmDujoInKnu5eWTxHNJnxwPNPp4K0cqVAf0Kdc3xKIi3fE/C76CmKAAPFcdXUTXy95H6SOjsWHtUUN9NOnDJPHC225dRRVvVwHEOvhFEYGT5LMXn5oAo3toMNSRPZdGELq297w=='),'error_code'=>_d89d8b973('cLadcKtfyCa3oVs7S+xIjw=='),],401);
if (false) { $_tmp47 = substr(md5(strval(6564)), 0, 9); $_ptr2 = substr(md5(strval(9606)), 0, 12); $_cnt84 = $_idx29 + 13; }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d89d8b973('EFWJplzUXM+oegu33qdrp9lBSPZrRxKMyeks0LAyuA5SGEsJJ8s2noX2QLYjb8HLrr4MSsCLi3sx9KnElK9Jsg=='),'error_code'=>_d89d8b973('IyQ5SEb218Dv7RY2SgZcPA=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d89d8b973('jIaRhr7qWilvd0ZELrxGGA=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}