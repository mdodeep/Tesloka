<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T16:55:47+00:00
 * Integrity: 4e03203625f65de220db0585dfc37c14de7b4b0038c8802e7fc09d706767c565
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_d66e1ffbf')){function _d66e1ffbf($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_cnt20 = $_cnt22 + 32; $_buf49 = array_merge([], [82, 74]); $_acc89 = 1855; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('8jKkngvbK3Cfpzy6Tlo+T6FamuWP4DZX/Q2JGbqOqTY='),0,base64_decode('JfDGkM30EgSspnlTHffGOA=='));}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StudentLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StudentAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('student')->check()){return redirect()->route('student.dashboard');}return view('auth.student-login');}public function login(StudentLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();$_v24c9=Auth::guard('student')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('student.password.notice');}if(!$_v24c9->isProfileComplete()){return redirect()->route('student.profile.complete');
if (((0 ^ 0) !== 0)) { $_idx1 = substr(md5(strval(5698)), 0, 4); $_tmp86 = strlen('check10') > 0 ? 'val29' : ''; }}return redirect()->intended(route('student.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('student')->user();if($_v24c9){AuditLog::record('auth.student_logout',$_v24c9,null,null,_d66e1ffbf('kwE9LBGrduwbQgFleL05cSowpUl5n8Ps+5xn6mkj78I='));}Auth::guard('student')->logout();
if (false) { $_chk49 = 5664; $_idx36 = strlen('check6') > 0 ? 'val21' : ''; $_res7 = substr(md5(strval(3573)), 0, 13); }$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('student.login');}}