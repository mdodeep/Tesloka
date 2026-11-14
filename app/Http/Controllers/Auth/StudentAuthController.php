<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:32:35+00:00
 * Integrity: c37ae77c3dfddfcdc69f30c82e42e08643fb3b05792cb81aa180f43bc4b02dfb
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_d60010115')){function _d60010115($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('brIibIiPNx0o495WdrVf6PRmm0stXmSMj+hmbYcCE+k='),0,base64_decode('jOhotcuOftURGslTRgQ9aw=='));}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StudentLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StudentAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('student')->check()){return redirect()->route('student.dashboard');}return view('auth.student-login');}public function login(StudentLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();$_v24c9=Auth::guard('student')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('student.password.notice');}if(!$_v24c9->isProfileComplete()){return redirect()->route('student.profile.complete');
if (((0 ^ 0) !== 0)) { $_ptr27 = substr(md5(strval(6287)), 0, 16); $_buf5 = strlen('check45') > 0 ? 'val80' : ''; $_acc8 = substr(md5(strval(5037)), 0, 13); }}return redirect()->intended(route('student.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('student')->user();if($_v24c9){AuditLog::record('auth.student_logout',$_v24c9,null,null,_d60010115('Wgom1Yy2CubbuIbxwYSWwiyT3fMwEd29jn+YU66uWAo='));}Auth::guard('student')->logout();$request->session()->invalidate();
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt39 = substr(md5(strval(4349)), 0, 10); $_buf88 = substr(md5(strval(5576)), 0, 12); $_res10 = array_merge([], [5, 37]); }$request->session()->regenerateToken();return redirect()->route('student.login');}}