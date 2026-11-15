<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:50:48+00:00
 * Integrity: da2d8e8e7eb35502158592fc7f4fb96f0713033f54d4fc850a96d2de053c79e8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2dc08c25')){function _d2dc08c25($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Ign9uLhux/xUSeR0ByXAhu6Hlo0RWtr1QxGXXxuy0UI='),0,base64_decode('0NrJVZMEKRhdAf09BlFHFw=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d2dc08c25('YcXgn2IUzeGU31A3OABkjQ=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_res93 = array_merge([], [38, 34]); }if(!$_ve285){$_vb5f7=$request->bearerToken();
if ((PHP_MAJOR_VERSION < 0)) { $_acc43 = 3218; $_tmp54 = strlen('check63') > 0 ? 'val81' : ''; }if($_vb5f7){$_ve285=$_vb5f7;
if (((0 ^ 0) !== 0)) { $_tmp12 = $_res43 + 18; $_acc78 = strlen('check76') > 0 ? 'val39' : ''; $_val34 = strlen('check25') > 0 ? 'val3' : ''; }}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d2dc08c25('cH7/NZ/XtGLnVhGog/HSoZG+qjoBvVvFyM6Oc7rdIgaJRqNldVqV+bEEGXVVHFbEw1tO+o6p9i8DinNgngOp6YuZvXvmauPIl/Km7Pe9gM5PrZLga6Nyv0SBsv4sCs9n7I88DoWW6EqhwCwqoeN9vw=='),'error_code'=>_d2dc08c25('kRCA5ciL1fymKV6Ruu8Mgg=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);
if ((!is_int(0))) { $_seg96 = $_cnt91 + 52; $_val40 = 5687; $_val2 = 4590; }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d2dc08c25('n0IDVIjxD6YiUgkifA1cll4oqei20Fi3KWaq5S4YrImQic1e6YRllg/vVfaY3A8vP8g6mFQQuefvIhkhCpuhFw=='),'error_code'=>_d2dc08c25('/u3oEGy7QFUmbl14RlHBAw=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d2dc08c25('Gqjk1IuAVEYVv4uM2eOI4Q=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}