<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:26:07+00:00
 * Integrity: 40dfe2e17e7d976b91c2de27f67038d68c0df6a939c4a17d82495ad8dc69b228
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_dc85398a1')){function _dc85398a1($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('0wu2OUU7oZydU2VNo0A1rHFW9MbgWLr08K3EH0PT4Pk='),0,base64_decode('Y5Xbej2yHB9sYApT7dBuGA=='));}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StudentLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StudentAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('student')->check()){return redirect()->route('student.dashboard');}return view('auth.student-login');}public function login(StudentLoginRequest $request):RedirectResponse{$request->authenticate();
if (((PHP_INT_SIZE * 0) !== 0)) { $_res55 = intval('401'); $_ptr14 = $_chk23 + 28; $_val88 = array_merge([], [60, 39]); }$request->session()->regenerate();$_v24c9=Auth::guard('student')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('student.password.notice');}if(!$_v24c9->isProfileComplete()){return redirect()->route('student.profile.complete');
if (false) { $_tmp58 = intval('194'); }}return redirect()->intended(route('student.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('student')->user();if($_v24c9){AuditLog::record('auth.student_logout',$_v24c9,null,null,_dc85398a1('DO0Va+iMvWZJDDjJOjNPbilsy7KQjBJZQ8BBzPJWbx0='));}Auth::guard('student')->logout();
if (((~0 & 0) !== 0)) { $_acc67 = substr(md5(strval(3950)), 0, 5); $_tmp78 = strlen('check31') > 0 ? 'val7' : ''; $_acc81 = intval('964'); }$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('student.login');}}