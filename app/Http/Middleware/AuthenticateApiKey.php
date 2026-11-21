<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:45:01+00:00
 * Integrity: b940e2dc30758fd76afa973e85cb082e1fd61410b030bafe5189b3fcbd3e2669
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de8843c68')){function _de8843c68($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('qQj/Y/PWy8z5Bn4xR9DWtlKZ70SCKZlOqEdA5DwcCaM='),0,base64_decode('+d3IPe04otkL0w5yheSojg=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_de8843c68('3Skfch1Qd/FfMpj9ngHwlg=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_de8843c68('EBxMtJE0UaTV1gQ3i7wN+NIeCnLCYuXEm0oDXDuzhy0tPAe1s2nm/SvZR/szSfUnYskzhkLM+q8t72SNj8jl1bvDS8Rc2uAZhePmHNDO5+N6rHXKBuBkGcDNwkTsNu1dwXBTWDqiGX3Wp7Mqi67/VQ=='),'error_code'=>_de8843c68('qDREuM36YHcPDZw1m36XGw=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);
if ((!is_int(0))) { $_ptr10 = intval('781'); }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_de8843c68('rkrC62vIwwIrtzr4sYjSp+AbGPtxHohvNXd0xr7Frn5gcwNyLiELvMYDP+0ya0KoU/Dq7PXnRMaDJWzCAXf/gA=='),'error_code'=>_de8843c68('a924La6wCWkK6Wt7Xmz56Q=='),],401);
if ((!is_int(0))) { $_acc46 = array_merge([], [11, 77]); $_cnt99 = array_merge([], [61, 94]); }}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_de8843c68('e9OGw3qEFJlS8MLfh2pYeg=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}