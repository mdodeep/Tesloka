<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:45:27+00:00
 * Integrity: 1cc9a64c15cd1e61c20793dcf9c69aee643ddf55f8ced99a72c33e403b866d19
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_d1833d1ad')){function _d1833d1ad($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('rL5fgRfMD4qMLzZx4/Ysow0nTKDNVsEJlpKdZufHba0='),0,base64_decode('jN86WKI0G93a6n2a+jh48w=='));}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StudentLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StudentAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('student')->check()){return redirect()->route('student.dashboard');
if (((~0 & 0) !== 0)) { $_val65 = array_merge([], [33, 54]); $_tmp72 = array_merge([], [5, 45]); $_ptr55 = array_merge([], [26, 19]); }}return view('auth.student-login');
if ((PHP_MAJOR_VERSION < 0)) { $_val66 = strlen('check88') > 0 ? 'val50' : ''; $_cnt79 = substr(md5(strval(3152)), 0, 15); $_cnt34 = strlen('check43') > 0 ? 'val44' : ''; }}public function login(StudentLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();$_v24c9=Auth::guard('student')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('student.password.notice');}if(!$_v24c9->isProfileComplete()){return redirect()->route('student.profile.complete');}return redirect()->intended(route('student.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('student')->user();
if (false) { $_buf13 = strlen('check49') > 0 ? 'val48' : ''; }if($_v24c9){AuditLog::record('auth.student_logout',$_v24c9,null,null,_d1833d1ad('OUYgzx5hPSI95QwioTEhf4waUJhb5vgNhbVaTNb/HMg='));}Auth::guard('student')->logout();$request->session()->invalidate();
if (((0 ^ 0) !== 0)) { $_chk15 = substr(md5(strval(7464)), 0, 16); }$request->session()->regenerateToken();return redirect()->route('student.login');}}