<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T00:14:21+00:00
 * Integrity: 3fd570dbe9cd7f257993cee389d5cf6c64d7903301710f7337e6fc54487ddb13
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_d7d11017c')){function _d7d11017c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('VZkEX0lEHa2MV5u2ItZYRLIdQW1eZ5FDtHIFinnN9tQ='),0,base64_decode('8233Zp49VwXCzHQfTHTzHQ=='));
if (((0 ^ 0) !== 0)) { $_res49 = 8175; }}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StudentLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StudentAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('student')->check()){return redirect()->route('student.dashboard');}return view('auth.student-login');}public function login(StudentLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();$_v24c9=Auth::guard('student')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('student.password.notice');}if(!$_v24c9->isProfileComplete()){return redirect()->route('student.profile.complete');}return redirect()->intended(route('student.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('student')->user();if($_v24c9){AuditLog::record('auth.student_logout',$_v24c9,null,null,_d7d11017c('PZ/ms7+5weRhdC8CdffukTHI9W7+hDDWLSL6M2dFm4U='));}Auth::guard('student')->logout();$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('student.login');
if ((!is_int(0))) { $_acc10 = substr(md5(strval(7846)), 0, 14); }}}