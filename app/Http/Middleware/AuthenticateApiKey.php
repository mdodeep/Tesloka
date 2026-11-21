<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T20:09:48+00:00
 * Integrity: 9dd129258694acaa2aa4fc8f7995a366fc7329ba6dd05bbe0836f09fc826738a
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d29bea074')){function _d29bea074($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Hnuv774Okn3jo1S2jVnYgz1l2UOjvzQGooAJJ2KqJks='),0,base64_decode('yTo+IU0uzoICvkzKBsP6Uw=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d29bea074('KiJ0Dmz13TTfsp69s1iOhQ=='));
if ((PHP_MAJOR_VERSION < 0)) { $_idx48 = 2162; $_idx34 = array_merge([], [3, 3]); }if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d29bea074('QBZqBen+Jf6ECuzFVSOD5LFP0KXQaboATI+9Ld+TlQuR+k4QryO++eZomv6bOWaBYUBGF5KXS92fxfC9ehuFbKW5rYe/WjQG8ZW4Xao0o/0DtojeL/V5X1VMjWuapOqPJB/ew4meVD999IlnDhs50Q=='),'error_code'=>_d29bea074('u9jwkbdrZYI+vgOK40UNdw=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d29bea074('aydbiJTLHEbj2HCsnBXBfUGNTd6XECABDFBPZy/sPXbyS9a00itXq79oDmOWb+RVXjv/d9XRyYFz1sOIJSzJew=='),'error_code'=>_d29bea074('JmzuwEXpnzHBZDwF3ZsEHA=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d29bea074('1B2K+NRoKr4jL3cHy5Gh6g=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}