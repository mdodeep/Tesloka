<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T23:50:51+00:00
 * Integrity: 69d7fbbda759854011d62cb7beb30af0765144337ca67cd655825eb5efe13bc4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d38f25435')){function _d38f25435($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_res43 = substr(md5(strval(7104)), 0, 8); $_val20 = strlen('check10') > 0 ? 'val29' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('2vYeQALRahtlXLbuP4l4feVe2XquHRhhRFXgMYHq99A='),0,base64_decode('56O3OpDaBsLamDCRx8gShQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d38f25435('ud2vPZs+lpGOZq1ZuDh13MxgEIoWptbUnYDNZ0l33pg=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d38f25435('4doaaEFeacpjwIRyfBc2bwDaeOKyjcsrfSNOTaa13Kk8VtcKIUfSJMibDc8LGoUTehV/cGRl0LzPWhA9AynwYmoukW0ERN7ul5RnFFsPcsn7My2alUjE/dToAvx2zxME')],403);}abort(403,_d38f25435('4doaaEFeacpjwIRyfBc2bwDaeOKyjcsrfSNOTaa13Kk8VtcKIUfSJMibDc8LGoUTehV/cGRl0LzPWhA9AynwYmoukW0ERN7ul5RnFFsPcsn7My2alUjE/dToAvx2zxME'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d38f25435('4doaaEFeacpjwIRyfBc2b13E7AUdhfShOjBKcxuZ/PgQ0oOkIZJH27DTQfyDk3yj4y7qdRxA5bIzo4+yOxvDEg==')],403);}abort(403,_d38f25435('4doaaEFeacpjwIRyfBc2b13E7AUdhfShOjBKcxuZ/PgQ0oOkIZJH27DTQfyDk3yj4y7qdRxA5bIzo4+yOxvDEg=='));
if (false) { $_cnt33 = intval('954'); $_seg33 = $_idx41 + 1; $_tmp16 = substr(md5(strval(295)), 0, 7); }}return $next($request);}}