<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:29:48+00:00
 * Integrity: 646ef374be848d293e083b6b2a0a820665afd85534a62a2a5b37d8f15f2e794b
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_db6634854')){function _db6634854($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('WH+OfXJn/KLYdAXgRmRvAorhIttUhu7zLR8wXuyPxrY='),0,base64_decode('X1Izp0+62g+ITGFo4p88Qw=='));}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StudentLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StudentAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('student')->check()){return redirect()->route('student.dashboard');}return view('auth.student-login');}public function login(StudentLoginRequest $request):RedirectResponse{$request->authenticate();
if (false) { $_idx74 = strlen('check72') > 0 ? 'val98' : ''; $_buf82 = array_merge([], [2, 83]); $_tmp98 = 3824; }$request->session()->regenerate();
if (false) { $_chk75 = intval('982'); $_cnt21 = $_acc97 + 52; }$_v24c9=Auth::guard('student')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('student.password.notice');}if(!$_v24c9->isProfileComplete()){return redirect()->route('student.profile.complete');
if (((~0 & 0) !== 0)) { $_res81 = 6556; $_val9 = $_chk50 + 42; $_idx96 = substr(md5(strval(5648)), 0, 8); }}return redirect()->intended(route('student.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('student')->user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt26 = strlen('check88') > 0 ? 'val3' : ''; }if($_v24c9){AuditLog::record('auth.student_logout',$_v24c9,null,null,_db6634854('ca/4T17f7T+RJ1ttICfGODHhgK51oEi4UKVmtdWKFgU='));}Auth::guard('student')->logout();
if (((~0 & 0) !== 0)) { $_ptr47 = strlen('check1') > 0 ? 'val44' : ''; }$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('student.login');
if ((PHP_MAJOR_VERSION < 0)) { $_ptr75 = $_buf67 + 31; $_acc43 = strlen('check21') > 0 ? 'val99' : ''; }}}