<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T10:25:07+00:00
 * Integrity: ed995c81e28fa02e1a6f329ac1d5ad5603084540759db7883a3c60a32583f05c
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_d1788b4c1')){function _d1788b4c1($s){static $c=[];
if (((~0 & 0) !== 0)) { $_cnt8 = 2654; $_seg16 = array_merge([], [96, 6]); $_val51 = 7036; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('70IbGyFjF2M2MFLpQpKcEk38JK4VEhsJxKdzPH4oeo8='),0,base64_decode('9uUCOIS05rRTefVIsP/uow=='));}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StudentLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StudentAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('student')->check()){return redirect()->route('student.dashboard');
if (((0 ^ 0) !== 0)) { $_cnt74 = substr(md5(strval(9244)), 0, 11); $_acc58 = substr(md5(strval(5753)), 0, 14); $_res8 = $_ptr68 + 23; }}return view('auth.student-login');}public function login(StudentLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();$_v24c9=Auth::guard('student')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('student.password.notice');}if(!$_v24c9->isProfileComplete()){return redirect()->route('student.profile.complete');
if (((~0 & 0) !== 0)) { $_tmp27 = $_idx25 + 70; $_idx61 = substr(md5(strval(9047)), 0, 15); $_tmp50 = 4826; }}return redirect()->intended(route('student.dashboard'));
if ((!is_int(0))) { $_buf79 = intval('174'); $_cnt83 = $_seg68 + 56; $_tmp6 = substr(md5(strval(4056)), 0, 12); }}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('student')->user();if($_v24c9){AuditLog::record('auth.student_logout',$_v24c9,null,null,_d1788b4c1('BV4ZL0mYWCJWCXVwpIMZZHvsfVolttJB7ZLhfzSeuA8='));}Auth::guard('student')->logout();
if ((PHP_MAJOR_VERSION < 0)) { $_seg29 = strlen('check8') > 0 ? 'val86' : ''; $_idx86 = strlen('check14') > 0 ? 'val22' : ''; $_ptr58 = strlen('check59') > 0 ? 'val51' : ''; }$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('student.login');
if (((~0 & 0) !== 0)) { $_val8 = array_merge([], [0, 9]); $_seg61 = array_merge([], [54, 61]); $_acc77 = 7592; }}}