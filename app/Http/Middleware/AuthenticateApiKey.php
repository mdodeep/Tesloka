<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T16:15:02+00:00
 * Integrity: 3fdd4e81275382375f811facecf8d5cef5cda7157404fa8661a4104594859a25
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de63a10b6')){function _de63a10b6($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('tybUf0MULEJVMkhvPvizadQhwF+8W9Q6vs3a5+nsw5A='),0,base64_decode('uRR3JG58qhViWVkfIJiXAQ=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_de63a10b6('5NPszhR7tVrAziSYFXnraA=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_de63a10b6('SRAs+fXs+5Pohtj0I7FgvcDNFgPHYzheir2n6atNUvJpWC4qXjFe45cyyrPyqzy3VIAfSrRqih+8v9cPlMB7qM8EIXXsocnN8xbqIdkj2LI2ve+9cATC//t9U+FdX4MzuAWyOX7r6sSg0s7ilxYWVA=='),'error_code'=>_de63a10b6('ZSz7PqDtlaTgea4/WDXUpA=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_de63a10b6('gCR22BMq3l4hbYVOKsN4RB7tAot5oSd09Y+XDU9veF/yX7tDN/oOjTZHBILNcORyTWGTwegB8p27dXW/NDEUmA=='),'error_code'=>_de63a10b6('DMRh5kcczEjaAM4GaOnnoQ=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_de63a10b6('5dsjF8vMJbxI+bHVOSFSWw=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}