<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T04:01:47+00:00
 * Integrity: f88df7d65adc1d8f0a18cd81bd0b15f0b7e9b62ece981f525d8fefa11912f0bf
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_deb6f994e')){function _deb6f994e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('kS+RbSsdtu7xYMWltFq1uesefydtdKoeL3BBd1glRq8='),0,base64_decode('386kcAQrMI3t8JZ1AI213w=='));
if (((0 ^ 0) !== 0)) { $_val67 = $_seg78 + 51; $_cnt33 = array_merge([], [58, 63]); }}}
use App\Services\ExamMonitoringService;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_deb6f994e('6xQP4SUYAqmUr/UOreEwCs7LvADOsTewd4fI3W/kjRU=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_deb6f994e('QgrpFoDF0HRybQJZDcSDZotOqSVol4zBvIOHyFs6ht9C9b1rAgt87p80cJo7oGskV3sWfpDxQQTVKZUYaWqRW/KPJ0BUSwajAhuflZ2L2Lm25ITCKM/TIL9gfFH//++E')],403);
if (((0 ^ 0) !== 0)) { $_res16 = strlen('check65') > 0 ? 'val25' : ''; }}abort(403,_deb6f994e('QgrpFoDF0HRybQJZDcSDZotOqSVol4zBvIOHyFs6ht9C9b1rAgt87p80cJo7oGskV3sWfpDxQQTVKZUYaWqRW/KPJ0BUSwajAhuflZ2L2Lm25ITCKM/TIL9gfFH//++E'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_deb6f994e('QgrpFoDF0HRybQJZDcSDZq6745bq1RdS4rXWKOHc8yJQbm0t4nhehgdSZkVMJnhFABJlBO9Y2szA4qTUt7BT0Q==')],403);}abort(403,_deb6f994e('QgrpFoDF0HRybQJZDcSDZq6745bq1RdS4rXWKOHc8yJQbm0t4nhehgdSZkVMJnhFABJlBO9Y2szA4qTUt7BT0Q=='));}if($portal==='student'&&!$request->routeIs('student.exam.heartbeat','student.logout')){$_va5f2=(int)$request->session()->get('student_authenticated_at',0);if(app(ExamMonitoringService::class)->shouldForceLogoutSession($_v7e58->id,$_va5f2)){app(ExamMonitoringService::class)->clearStudentForceLogout($_v7e58->id);
if (false) { $_buf98 = array_merge([], [43, 67]); }Auth::guard('student')->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v8325=_deb6f994e('3IFmy6Ch3ElqErC3yMj+whPpvuKdPqSXD89UU2yIQ5OwzizUuzzG0xBLvewUUx+gc2cBce3gHPa9Us3Uh/q8FA4qgFox8v0wRpO7fLGLQqGjSZhNtd526AON72MJHLIzgIQCEoUAiPy6gceHJxL/O9DRjT8AbvRFYvio+FwvRyw=');if($request->expectsJson()){return response()->json(['message'=>$_v8325,'instruction'=>'force_logout','redirect_url'=>route('student.login'),],401);
if (false) { $_idx10 = intval('873'); $_idx97 = strlen('check96') > 0 ? 'val10' : ''; }}return redirect()->route('student.login')->with('warning',$_v8325);
if (false) { $_tmp74 = $_ptr91 + 8; }}}return $next($request);
if (((~0 & 0) !== 0)) { $_val74 = 9263; $_acc10 = intval('815'); $_res25 = $_cnt49 + 31; }}}