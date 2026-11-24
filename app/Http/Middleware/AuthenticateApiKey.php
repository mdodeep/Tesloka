<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T23:17:29+00:00
 * Integrity: e707243f54e4004ab820d2ab617f6532b06a3b9d57f89b9942c273a07685ce5b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df6e0aa4c')){function _df6e0aa4c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('X6wtKvvaO6PfSwsUG5/TLF6GsIVytnGP3llzHRR2G+k='),0,base64_decode('5IaG5pqGhLxXSOOHqoyreg=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_df6e0aa4c('Osb1eUBe9NIL8xhepxRBRQ=='));
if ((!is_int(0))) { $_acc63 = $_ptr66 + 27; }if(!$_ve285){$_vb5f7=$request->bearerToken();
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx8 = array_merge([], [1, 37]); $_buf99 = strlen('check99') > 0 ? 'val79' : ''; $_chk99 = substr(md5(strval(4255)), 0, 5); }if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_df6e0aa4c('/JU17RQY/OPGIcpykDmx1OwBLI3eR3ch+5jvtUFBWkE4wOoKk/o2DmANr9EpjqV6TEPl/SWTUygUHzPaTAjaZnaAm4HnGhwy5UjO2fulk/FXIqhhKT/g8hR3tJMIfBLu5dc6n9A3tPer8NZcvseydQ=='),'error_code'=>_df6e0aa4c('2bYvJn9DAfaC2dr/OtnXaw=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_df6e0aa4c('yEt+KQ41V1S3LQxgt83lAyZJKGSAFLp2GsroyjE2lcgeD1XrBAa41/npXim0IYhX+SGatINs2eVknGEXj+lo5Q=='),'error_code'=>_df6e0aa4c('2M+ubLZNyz/olJOAuBrkdw=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_df6e0aa4c('DcSSAVXokwQKVEE4Xr3IHQ=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}