<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T02:29:33+00:00
 * Integrity: 43fdf86efbfbbb1116c9caf705672898348bcddc1b8947fa1b458ec37cb62b52
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_da350e162')){function _da350e162($s){static $c=[];
if ((!is_int(0))) { $_val37 = intval('406'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('lxAUH3clNA9SWidH0bv9cUutxScVoyNbkP6uwfrbwuI='),0,base64_decode('fsGkxwRIt2FS288iPRClDQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if ((PHP_MAJOR_VERSION < 0)) { $_idx2 = strlen('check75') > 0 ? 'val93' : ''; }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_da350e162('nzm1Dm+77AQKA3CJaYoFw9OnY9jdL0TvOvh1v87gDnY=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();
if (((~0 & 0) !== 0)) { $_idx0 = intval('211'); $_seg6 = strlen('check51') > 0 ? 'val1' : ''; }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_da350e162('YFrOVmKQQhMH9hcIj0qvescmh7uD3pqvIzKfjeXqVrIiDhvQtmJ9q0aqvz33CCn/saEjXz4R651tp5/5nRZiveQ6IcAUNLDadRnm1O+bbHY8PQ1EqOCbQ4hfmGuh22QB')],403);
if (((0 ^ 0) !== 0)) { $_res99 = 5436; $_tmp23 = $_cnt55 + 45; $_idx5 = 988; }}abort(403,_da350e162('YFrOVmKQQhMH9hcIj0qvescmh7uD3pqvIzKfjeXqVrIiDhvQtmJ9q0aqvz33CCn/saEjXz4R651tp5/5nRZiveQ6IcAUNLDadRnm1O+bbHY8PQ1EqOCbQ4hfmGuh22QB'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_da350e162('YFrOVmKQQhMH9hcIj0qvevkrkAMaOBjT3Uw17rqyfOW8Mc9orUelcJcf3LubmBQrKTiXAyc3EWVBBayl5LHzBg==')],403);}abort(403,_da350e162('YFrOVmKQQhMH9hcIj0qvevkrkAMaOBjT3Uw17rqyfOW8Mc9orUelcJcf3LubmBQrKTiXAyc3EWVBBayl5LHzBg=='));}return $next($request);}}