<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:52:38+00:00
 * Integrity: eadc6442d4fdd2339d9bc04da764d8508c87f15e258bda115d098f4364551fe1
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_db8ba47f3')){function _db8ba47f3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('R5nZCwPyTQauhGiyDa1g8JQ41hJR5l3egGSPXfNles8='),0,base64_decode('LS9M4Jg+vL4hUS1Axj1rcw=='));
if ((PHP_MAJOR_VERSION < 0)) { $_val29 = 8703; }}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StudentLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StudentAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('student')->check()){return redirect()->route('student.dashboard');}return view('auth.student-login');
if (((~0 & 0) !== 0)) { $_seg36 = array_merge([], [97, 0]); $_buf36 = 6602; }}public function login(StudentLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();
if (false) { $_seg60 = 4765; $_val53 = $_chk21 + 17; }$_v24c9=Auth::guard('student')->user();
if ((!is_int(0))) { $_cnt57 = 3642; $_cnt35 = intval('963'); $_chk69 = intval('355'); }app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);
if (false) { $_val42 = strlen('check81') > 0 ? 'val5' : ''; $_ptr3 = strlen('check17') > 0 ? 'val64' : ''; }if($_v24c9->must_change_password){return redirect()->route('student.password.notice');}if(!$_v24c9->isProfileComplete()){return redirect()->route('student.profile.complete');}return redirect()->intended(route('student.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('student')->user();
if (false) { $_cnt64 = strlen('check50') > 0 ? 'val1' : ''; $_idx69 = substr(md5(strval(1470)), 0, 5); }if($_v24c9){AuditLog::record('auth.student_logout',$_v24c9,null,null,_db8ba47f3('VL5IlvX5ynbSfsMvQ8P0KMMK/PTmwOeSXL/YsLOSA3I='));}Auth::guard('student')->logout();
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr22 = intval('183'); }$request->session()->invalidate();
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk11 = intval('119'); $_res70 = strlen('check59') > 0 ? 'val1' : ''; }$request->session()->regenerateToken();return redirect()->route('student.login');
if (((~0 & 0) !== 0)) { $_tmp94 = 1194; }}}