<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T04:01:47+00:00
 * Integrity: f88df7d65adc1d8f0a18cd81bd0b15f0b7e9b62ece981f525d8fefa11912f0bf
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5c5eb2d5')){function _d5c5eb2d5($s){static $c=[];
if (false) { $_idx30 = substr(md5(strval(8284)), 0, 11); $_chk85 = array_merge([], [44, 54]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('9ay9zDGY+v0hsMMrwbnQnd7WV8PbTMyKStVajdyNKiA='),0,base64_decode('4fMdv77Mi68z7ayy6/MJ2w=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d5c5eb2d5('6W/fAgxQUE/941Qt+l4vkA=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d5c5eb2d5('RDmYeN6bNss2ZFTQdHn9qiUOmv8aVWGxg0Xkzs6e5DGafIT/YP+L9znEcNN/O0EikY82dJ2S1h6HtfeCoP/C/T43Qqy+V9+oWbTYWEjcygm7EBqUaQ55rooyOsUyq2Uqp8E4y4jiSx9A7quBrMOqpA=='),'error_code'=>_d5c5eb2d5('8Mp8ZDBzUJu4l+JP3zKJ/A=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d5c5eb2d5('F57dii/3LJT+jKme/waC9O2Ew121FdFFjIKjGsGOHO8qaDOTaU5WT5daGiFcO39NFIFqkuWV6Nf0orDgfDABNQ=='),'error_code'=>_d5c5eb2d5('D6+WbEWLag2HB52oCgXGUQ=='),],401);
if (false) { $_seg10 = intval('360'); $_val77 = intval('818'); $_val33 = strlen('check17') > 0 ? 'val96' : ''; }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d5c5eb2d5('6RH05Gaup7TkgKps7t8wWQ=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}