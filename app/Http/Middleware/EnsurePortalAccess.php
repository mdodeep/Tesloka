<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T03:05:09+00:00
 * Integrity: 1e24c363d85e708fbdde991639b71956d2905d9444263065cd3e90b56657d275
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d978b8442')){function _d978b8442($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('sf8NbVAte2GxHYp62zmLPkjJsgFlNhh5z1VmuOir/NA='),0,base64_decode('+o8cDrn4ty/jaPpFsCugnQ=='));}}
use App\Services\ExamMonitoringService;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if (((~0 & 0) !== 0)) { $_idx26 = intval('577'); }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d978b8442('/5TBfjXH8pCz80Ii8RSCH1zu+Omg69orADCvtmXXR7E=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if (false) { $_idx37 = $_seg15 + 23; $_cnt51 = intval('305'); }}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d978b8442('8WWWIXyLIg2xaNvBnNoFzFyjjiQFrWqMoYGLPdTjE/4/9obJdjKdFYlmfGIUu/GaufJittk5IP1qln/mkNJgXExOm1DxDvcIyrJZ4gpsFvDeX90Q56AuhnCGI2IluADR')],403);}abort(403,_d978b8442('8WWWIXyLIg2xaNvBnNoFzFyjjiQFrWqMoYGLPdTjE/4/9obJdjKdFYlmfGIUu/GaufJittk5IP1qln/mkNJgXExOm1DxDvcIyrJZ4gpsFvDeX90Q56AuhnCGI2IluADR'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d978b8442('8WWWIXyLIg2xaNvBnNoFzOUE3SP+rViTH0Ve3CT4hR2C767Aroqf+c7WQiGUG3S/2wS4V2IjwONwVmTa6otqag==')],403);}abort(403,_d978b8442('8WWWIXyLIg2xaNvBnNoFzOUE3SP+rViTH0Ve3CT4hR2C767Aroqf+c7WQiGUG3S/2wS4V2IjwONwVmTa6otqag=='));}if($portal==='student'&&!$request->routeIs('student.exam.heartbeat','student.logout')){$_va5f2=(int)$request->session()->get('student_authenticated_at',0);
if ((!is_int(0))) { $_cnt24 = intval('316'); $_acc76 = 7355; }if(app(ExamMonitoringService::class)->shouldForceLogoutSession($_v7e58->id,$_va5f2)){app(ExamMonitoringService::class)->clearStudentForceLogout($_v7e58->id);Auth::guard('student')->logout();
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp5 = intval('930'); }$request->session()->invalidate();$request->session()->regenerateToken();$_v8325=_d978b8442('dZvnwci4TC0+CMRoPGkJ6bBDgsLB7GBlwEV3RJzuKtgJmtBdpfcOOaLdppCDGB80XsGBniTw5fQ5AzO/v/d+kB0P784/ilXR/iDzqbdV9m8q2Zqoad+3HkRODhR98wMXCHOytkgm8bu+8UzkmwBwl7ofCPufTpebY9fn6eyN1mc=');
if (((~0 & 0) !== 0)) { $_res26 = array_merge([], [87, 40]); }if($request->expectsJson()){return response()->json(['message'=>$_v8325,'instruction'=>'force_logout','redirect_url'=>route('student.login'),],401);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp43 = intval('712'); }}return redirect()->route('student.login')->with('warning',$_v8325);}}return $next($request);}}