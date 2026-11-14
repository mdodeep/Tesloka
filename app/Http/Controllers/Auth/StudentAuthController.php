<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:33:02+00:00
 * Integrity: 6617f9441883322ea6dc9c7e36b83dd46a463f11d9f5f74ed153991a79ae4cb4
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_d5f407a2b')){function _d5f407a2b($s){static $c=[];
if (((~0 & 0) !== 0)) { $_tmp98 = 6923; $_seg10 = $_seg45 + 77; $_res36 = $_val20 + 52; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('zLKfv9oeHCbWnUEHKpcVK7CwxfAOUlhGuT7q3jk8rZA='),0,base64_decode('BfQBDsf283O9QjgXUkTK9w=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_val79 = strlen('check19') > 0 ? 'val37' : ''; $_chk44 = array_merge([], [37, 61]); $_acc81 = array_merge([], [29, 5]); }}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StudentLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StudentAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('student')->check()){return redirect()->route('student.dashboard');}return view('auth.student-login');}public function login(StudentLoginRequest $request):RedirectResponse{$request->authenticate();
if (((0 ^ 0) !== 0)) { $_cnt40 = intval('126'); }$request->session()->regenerate();$_v24c9=Auth::guard('student')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('student.password.notice');}if(!$_v24c9->isProfileComplete()){return redirect()->route('student.profile.complete');
if (((~0 & 0) !== 0)) { $_idx71 = $_idx71 + 52; }}return redirect()->intended(route('student.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('student')->user();if($_v24c9){AuditLog::record('auth.student_logout',$_v24c9,null,null,_d5f407a2b('6mNzDT7qmZ0vpe0RHPFv/EIx2/ANS5gU942hi5l2FEg='));
if ((PHP_MAJOR_VERSION < 0)) { $_chk68 = 1529; $_acc72 = $_idx63 + 19; }}Auth::guard('student')->logout();$request->session()->invalidate();
if (((0 ^ 0) !== 0)) { $_val61 = 4031; $_buf9 = substr(md5(strval(1124)), 0, 7); }$request->session()->regenerateToken();return redirect()->route('student.login');}}