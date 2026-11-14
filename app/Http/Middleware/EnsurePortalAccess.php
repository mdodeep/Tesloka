<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T16:16:51+00:00
 * Integrity: b673b20a2930094cebc22ad245023decb7a42598d258d4d6d8c4c6cb6524651e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d61648c8f')){function _d61648c8f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('2KClKauhyx6x8pt38Vhqmue3jxqe2VJ8+DjBb65gvqY='),0,base64_decode('knHzkBJrh9MshMQLMLVgXg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if ((PHP_MAJOR_VERSION < 0)) { $_seg30 = 2310; $_cnt72 = strlen('check72') > 0 ? 'val90' : ''; }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d61648c8f('l/GqJlm67Ut7V4a6KZ0W5NxCfmuxOgkgs7xQ8brf/vs=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d61648c8f('mgf8+0SW2C2kRFTDmDRXxLyoF2xDHJzjrP5TkObNQagzrnRanXSWXsJHS7GyHoGDuWID9V9mVs36iOtu05n4SmPTxBCM1W9OdTvY7YAbm7n5AzxU782TrNXlL7W5E28Z')],403);}abort(403,_d61648c8f('mgf8+0SW2C2kRFTDmDRXxLyoF2xDHJzjrP5TkObNQagzrnRanXSWXsJHS7GyHoGDuWID9V9mVs36iOtu05n4SmPTxBCM1W9OdTvY7YAbm7n5AzxU782TrNXlL7W5E28Z'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d61648c8f('mgf8+0SW2C2kRFTDmDRXxHeYxOrh9ln1hGFYUvtOSJPRvn9FG7uz0RLamwi2aEkxrvpERrbgOdVqmPV8z2gelA==')],403);}abort(403,_d61648c8f('mgf8+0SW2C2kRFTDmDRXxHeYxOrh9ln1hGFYUvtOSJPRvn9FG7uz0RLamwi2aEkxrvpERrbgOdVqmPV8z2gelA=='));}return $next($request);
if ((!is_int(0))) { $_cnt68 = 1450; $_acc67 = 2417; $_res18 = intval('421'); }}}