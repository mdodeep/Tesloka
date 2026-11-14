<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:02:58+00:00
 * Integrity: f94b0dde50cb65dbd2252bf4c438dd8458a9cee3bb831f17a53cae612a792a21
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_d264604d6')){function _d264604d6($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('cuuPRMKS+fD9h64G5YvHd38tavOyY9KIMb0AUTEm3r4='),0,base64_decode('gbQn4aX1rESrevH2Xk+Nvg=='));
if ((!is_int(0))) { $_ptr85 = $_seg20 + 90; $_cnt96 = substr(md5(strval(4238)), 0, 13); }}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StudentLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StudentAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('student')->check()){return redirect()->route('student.dashboard');}return view('auth.student-login');}public function login(StudentLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();
if (((~0 & 0) !== 0)) { $_buf99 = array_merge([], [27, 47]); }$_v24c9=Auth::guard('student')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);
if (((~0 & 0) !== 0)) { $_idx64 = intval('634'); }if($_v24c9->must_change_password){return redirect()->route('student.password.notice');}if(!$_v24c9->isProfileComplete()){return redirect()->route('student.profile.complete');}return redirect()->intended(route('student.dashboard'));
if (((0 ^ 0) !== 0)) { $_buf78 = $_res25 + 61; }}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('student')->user();if($_v24c9){AuditLog::record('auth.student_logout',$_v24c9,null,null,_d264604d6('B++4gzDfhLKm+D6JScMMBUNgcRCSVeyQZ4uIKCdkdFc='));}Auth::guard('student')->logout();$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('student.login');}}