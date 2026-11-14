<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:39:28+00:00
 * Integrity: 6a8d7cee511dafadb162bbc7b57792dbf936ef3d7540e180cb5c13f51e9b532e
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_d37b5c369')){function _d37b5c369($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('dlzyQdOVmd75ldvxltFbfay1VNAKg8/qctMMwotO0gA='),0,base64_decode('u1j6/0Of3/JDmqWaSoAyiA=='));
if (((~0 & 0) !== 0)) { $_seg94 = array_merge([], [73, 6]); $_acc76 = $_buf4 + 2; }}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StudentLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StudentAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('student')->check()){return redirect()->route('student.dashboard');}return view('auth.student-login');}public function login(StudentLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();$_v24c9=Auth::guard('student')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('student.password.notice');
if (((0 ^ 0) !== 0)) { $_tmp17 = $_seg8 + 51; $_buf18 = strlen('check29') > 0 ? 'val95' : ''; }}if(!$_v24c9->isProfileComplete()){return redirect()->route('student.profile.complete');}return redirect()->intended(route('student.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('student')->user();if($_v24c9){AuditLog::record('auth.student_logout',$_v24c9,null,null,_d37b5c369('1ju0Qbu4d64QHkOJk5FHnN7KqiWdyGWdvhx6u6N+LVM='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf49 = $_chk26 + 85; }}Auth::guard('student')->logout();$request->session()->invalidate();$request->session()->regenerateToken();
if (((0 ^ 0) !== 0)) { $_tmp84 = 9703; $_buf36 = substr(md5(strval(2613)), 0, 16); }return redirect()->route('student.login');
if (false) { $_seg19 = 9942; $_ptr36 = substr(md5(strval(7979)), 0, 5); $_buf29 = substr(md5(strval(3233)), 0, 16); }}}