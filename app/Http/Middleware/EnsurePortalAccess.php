<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:45:01+00:00
 * Integrity: b940e2dc30758fd76afa973e85cb082e1fd61410b030bafe5189b3fcbd3e2669
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_ddb91a121')){function _ddb91a121($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('gqloaluHTlHYpPBznt8rR2K+C+5y4CEWAa7h4NZYakY='),0,base64_decode('dUCiqK8rP56htbyaOTjWQw=='));
if (false) { $_idx26 = $_idx52 + 23; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if ((PHP_MAJOR_VERSION < 0)) { $_acc25 = intval('332'); }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_ddb91a121('6/1ROilKQUFPufxgFEJTkP1sHmP3lIV92Emj1NQqxPc=')],401);
if (false) { $_idx7 = intval('995'); }}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_ddb91a121('oSz1r/HHXkD9YML4Qi+vvjhFqh7VA1WeEvXh70xfr1pEqVdlZ6Ib3f4ue+K8JoU9DyLfLA6z0hbQjuz2Vf6KZhu4n2m+7VC6vj7dWkrcB4oMXciIk/ViFGyIVUzjUIsF')],403);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk41 = array_merge([], [21, 90]); $_idx80 = substr(md5(strval(3631)), 0, 14); $_chk56 = array_merge([], [25, 92]); }}abort(403,_ddb91a121('oSz1r/HHXkD9YML4Qi+vvjhFqh7VA1WeEvXh70xfr1pEqVdlZ6Ib3f4ue+K8JoU9DyLfLA6z0hbQjuz2Vf6KZhu4n2m+7VC6vj7dWkrcB4oMXciIk/ViFGyIVUzjUIsF'));
if (((0 ^ 0) !== 0)) { $_chk80 = array_merge([], [70, 21]); $_res11 = strlen('check51') > 0 ? 'val70' : ''; }}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_ddb91a121('oSz1r/HHXkD9YML4Qi+vvpS1FsfgVyrofnu8mtFDR1NRf/JokqHSnPHKjNvmGT4W1TCfsWN4K4l7JSAA7I1M9w==')],403);}abort(403,_ddb91a121('oSz1r/HHXkD9YML4Qi+vvpS1FsfgVyrofnu8mtFDR1NRf/JokqHSnPHKjNvmGT4W1TCfsWN4K4l7JSAA7I1M9w=='));
if (false) { $_acc64 = strlen('check70') > 0 ? 'val63' : ''; }}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_chk32 = 5373; $_buf72 = substr(md5(strval(9491)), 0, 15); $_acc24 = 5403; }}}