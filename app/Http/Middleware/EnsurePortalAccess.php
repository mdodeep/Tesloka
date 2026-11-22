<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T10:14:49+00:00
 * Integrity: 096d75a3c35e79c736ec1fb7f20c5bf8340466d2a454dcd70de7e725cf6b9e60
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9db6ceac')){function _d9db6ceac($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Vz/F1n9m9NzoxHfqq/JcThj74OrStqZnVpDdPfhioJw='),0,base64_decode('ZnYo3YQGi8QBLwaaiMtn3A=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d9db6ceac('A/uZAAP4us+R6vDz51U+a9DY7LfMaPZAdhGEVbdn3rM=')],401);
if (((~0 & 0) !== 0)) { $_tmp25 = $_buf36 + 59; $_cnt27 = 1774; $_idx11 = 1138; }}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if (false) { $_cnt38 = strlen('check80') > 0 ? 'val90' : ''; }}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d9db6ceac('DVV/WZGsYWNJl6WTv27d+mcA1Nv3niS+17347jBBRX1uWCH/Jk0BhnhboMHSJlPU6Wg29P36xrFE72YTurhhlzG8jngVaRzukFJC6yAVEF9p794NiLfsxY+khFJCreR6')],403);}abort(403,_d9db6ceac('DVV/WZGsYWNJl6WTv27d+mcA1Nv3niS+17347jBBRX1uWCH/Jk0BhnhboMHSJlPU6Wg29P36xrFE72YTurhhlzG8jngVaRzukFJC6yAVEF9p794NiLfsxY+khFJCreR6'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d9db6ceac('DVV/WZGsYWNJl6WTv27d+tyq1OqoF2ESHN/4Qv49rR8sRGt+zFOdCeXUIYH9vwR4l14Mdno6qaofFqmHhQN5Bw==')],403);}abort(403,_d9db6ceac('DVV/WZGsYWNJl6WTv27d+tyq1OqoF2ESHN/4Qv49rR8sRGt+zFOdCeXUIYH9vwR4l14Mdno6qaofFqmHhQN5Bw=='));}return $next($request);}}