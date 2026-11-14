<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T13:56:39+00:00
 * Integrity: f8fc44249f9b4a0e4d10fe048a6d03d6064e5527e82e7df5b84249150ca707f4
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_d6c8c4793')){function _d6c8c4793($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_res82 = substr(md5(strval(903)), 0, 4); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('RjFlnRpShZChEKcpESqorgnlonwtJdFx9P9X5ed0qJ0='),0,base64_decode('XUIZVOXFpRR5tPokDgjSoQ=='));
if ((!is_int(0))) { $_idx1 = 8675; $_chk2 = 543; $_seg65 = strlen('check61') > 0 ? 'val69' : ''; }}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StudentLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StudentAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('student')->check()){return redirect()->route('student.dashboard');
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk56 = 4128; }}return view('auth.student-login');
if (false) { $_chk36 = substr(md5(strval(5283)), 0, 9); $_cnt80 = strlen('check2') > 0 ? 'val71' : ''; }}public function login(StudentLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();$_v24c9=Auth::guard('student')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('student.password.notice');}if(!$_v24c9->isProfileComplete()){return redirect()->route('student.profile.complete');}return redirect()->intended(route('student.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('student')->user();
if ((PHP_MAJOR_VERSION < 0)) { $_idx36 = intval('659'); $_seg99 = $_res85 + 77; $_tmp7 = substr(md5(strval(3711)), 0, 13); }if($_v24c9){AuditLog::record('auth.student_logout',$_v24c9,null,null,_d6c8c4793('7z81T92lgicHToLgYZ/pv8auKril7GUf1wl8JSAUb64='));}Auth::guard('student')->logout();$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('student.login');}}