<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T10:14:49+00:00
 * Integrity: 096d75a3c35e79c736ec1fb7f20c5bf8340466d2a454dcd70de7e725cf6b9e60
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df8683d46')){function _df8683d46($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('o0KyXQb1xMmO1kPNdONUytNENiEVtOjWr/wEmks/qMM='),0,base64_decode('SyBJiJ+skQhv4ZPXf9Xl1g=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_df8683d46('leRRBdeqAXbfLudDWurZvw=='));
if (((0 ^ 0) !== 0)) { $_val42 = intval('647'); $_res66 = strlen('check80') > 0 ? 'val65' : ''; }if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_df8683d46('pxeYVZI9TpMuEoVIgmKHWSDYFJrKrGoHzxnkR/10nC8ok9oOZ9gRkDn+VvVs0Ik9PPXmfnAzOnqE5Yi5XenuvgWwljCA9zJMS457v838JRSXjeld2Ty0toxFUZ7CNfG/aIwX1AwG/QWhpBo0UcHwTA=='),'error_code'=>_df8683d46('yHtbN0BuZPWLQp/cJfIrww=='),],401);
if (((~0 & 0) !== 0)) { $_acc56 = $_tmp64 + 78; }}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_df8683d46('S3VCzXH+HceECEExlKDvu6q4/MZ1JUOubFgG9JPmfieNKBSSYZ9NcqIy4nEEx7sYbw2a9nfZxH0+Q251plmDXA=='),'error_code'=>_df8683d46('2pY2MSp35XZ/rrIBux6ZNw=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_df8683d46('/aZ6pxftu/6NdL+r23oMRQ=='),],403);
if (((~0 & 0) !== 0)) { $_tmp0 = 6076; }}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}