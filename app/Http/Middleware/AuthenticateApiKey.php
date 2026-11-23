<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T22:27:06+00:00
 * Integrity: ebcea66457880820c7079869e7f5d901176712a76794500d6d4f553657aea1a3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db03819e6')){function _db03819e6($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Wf8Sjo0Z37j7Fz8tKjiC19n3X6WEfA9KsRN0YdqdZLc='),0,base64_decode('600WjY9k1nqcJa8ARzRqmg=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_db03819e6('65oGpgbRhxmxlZhkqMwTXA=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_db03819e6('LS1sxQLYODgm6WGS/IoPQTT5hdZllLOgayTRw5eWXVSvy1nTtiXznyMjhLNwBh/laTFZ0BXNI5+DkbdmCG8/h6j+i3JEbNnEj6DUDNiYafUicm0V8yDMhnk65+D0oyQXfeYh0EikaIeITBfEp/Mbdg=='),'error_code'=>_db03819e6('g77a+wsoa+iUjJbDFx6YQw=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_db03819e6('8kmAkiPCfye8UP+qkNgB6CxmCDtjrJDlKLJsakhuu7PNEA0Wmpvft4lvi3q/ZamsnFzCj5h4irnPJRtzOJfIgw=='),'error_code'=>_db03819e6('OFQoUmZkIx65HstbpFDKoA=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_db03819e6('qr7Ds175x8VkY6AJ5ditgw=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}