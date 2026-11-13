<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T09:24:25+00:00
 * Integrity: 538a45338bd1018a11c642d0f3358955b956c4f78fc5eb36b689fcf487b88d6c
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_d390ee428')){function _d390ee428($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('KGpjf5vp5ZyNPWOaPIJ5T19GJrFrdWhJVreH5C6+K7E='),0,base64_decode('oLMENx3wmlOWcXaYwcRYGg=='));
if (false) { $_idx68 = intval('951'); }}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StudentLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StudentAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('student')->check()){return redirect()->route('student.dashboard');}return view('auth.student-login');
if ((PHP_MAJOR_VERSION < 0)) { $_val90 = substr(md5(strval(6413)), 0, 9); $_acc85 = 9731; }}public function login(StudentLoginRequest $request):RedirectResponse{$request->authenticate();
if ((!is_int(0))) { $_res3 = substr(md5(strval(5107)), 0, 6); $_acc96 = $_tmp58 + 49; $_acc88 = $_res57 + 97; }$request->session()->regenerate();$_v24c9=Auth::guard('student')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('student.password.notice');}if(!$_v24c9->isProfileComplete()){return redirect()->route('student.profile.complete');}return redirect()->intended(route('student.dashboard'));
if (((~0 & 0) !== 0)) { $_acc28 = strlen('check39') > 0 ? 'val16' : ''; $_val3 = substr(md5(strval(1562)), 0, 14); $_seg45 = intval('553'); }}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('student')->user();
if (((~0 & 0) !== 0)) { $_cnt25 = intval('964'); }if($_v24c9){AuditLog::record('auth.student_logout',$_v24c9,null,null,_d390ee428('4KCWJWzJS5rV2xXgj+SzSQgC50J0BkbSank3EZhyMMk='));}Auth::guard('student')->logout();
if (((~0 & 0) !== 0)) { $_buf45 = array_merge([], [97, 65]); }$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('student.login');}}