<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T11:11:47+00:00
 * Integrity: 882f55aec517e9c0f8ea4fdf5b9f2860fcdaa027af633290f3a236ea81035c1f
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d11de38b7')){function _d11de38b7($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('O0h2vv1t4elbBnGEFhURt3ifgblk2kkkztJY2760/A4='),0,base64_decode('s55IXBElXAFfuA6ypY4f4w=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d11de38b7('qUcCtf/4wXaHzrwXlitLDQ=='));if(!$_ve285){$_vb5f7=$request->bearerToken();
if ((PHP_MAJOR_VERSION < 0)) { $_seg11 = strlen('check22') > 0 ? 'val34' : ''; $_idx26 = strlen('check0') > 0 ? 'val93' : ''; }if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d11de38b7('4SI/PzMLLaFuDLNJZqgGJn8JEGJxfessXGqTwx/Kvh505PWDUSFLHMc1E7Q1zpRzEQXU6L7Cm/UdYLrD8pZ5qFdyAJKnhcCrmjSmjCWqGBikswcxGCwUHCSsMi8yh4hS8teSNoBiFJeTHRRLM/A+sg=='),'error_code'=>_d11de38b7('ifaqRRKEp4ZNkmCykbCGiQ=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);
if (((~0 & 0) !== 0)) { $_cnt11 = strlen('check15') > 0 ? 'val15' : ''; $_tmp38 = array_merge([], [41, 42]); }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d11de38b7('tpmeFBfj1a3U3PlEys7VjX2AXf4rX+a++az/5BmFA6sht8UdXQgrBfhhu44Wp7zxBoprwpZ7pKCk1Eylam9qDg=='),'error_code'=>_d11de38b7('d9OjkVyQjt8C4+ChbLEvKw=='),],401);
if (((0 ^ 0) !== 0)) { $_cnt50 = 5489; $_val8 = strlen('check86') > 0 ? 'val8' : ''; }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d11de38b7('nGrRKN1dmi6t12MvXrWwaw=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}