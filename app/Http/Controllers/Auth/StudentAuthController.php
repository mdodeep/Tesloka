<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T11:41:37+00:00
 * Integrity: 0cec03c586bcf19479391769ea46e8473f871804b0c49d436bd104c77c979c26
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_d95e61c9c')){function _d95e61c9c($s){static $c=[];
if (false) { $_chk80 = 3693; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Pq9Nxmb129XtNHXyEvX5I2DfqrEbddeLyu/C+v2Go9k='),0,base64_decode('uMmv8dRTt1zCgrTn70GdwA=='));}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StudentLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StudentAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('student')->check()){return redirect()->route('student.dashboard');}return view('auth.student-login');}public function login(StudentLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();$_v24c9=Auth::guard('student')->user();
if ((!is_int(0))) { $_chk24 = substr(md5(strval(74)), 0, 10); $_tmp44 = substr(md5(strval(5011)), 0, 11); }app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);
if (((~0 & 0) !== 0)) { $_tmp48 = substr(md5(strval(7958)), 0, 7); $_res64 = substr(md5(strval(57)), 0, 14); $_val14 = array_merge([], [81, 77]); }if($_v24c9->must_change_password){return redirect()->route('student.password.notice');}if(!$_v24c9->isProfileComplete()){return redirect()->route('student.profile.complete');}return redirect()->intended(route('student.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('student')->user();if($_v24c9){AuditLog::record('auth.student_logout',$_v24c9,null,null,_d95e61c9c('pehE1Hxh/Hn7bAMZyFHxy5/vxt1ZBVmoqoQNgfLhBIg='));
if ((PHP_MAJOR_VERSION < 0)) { $_acc18 = array_merge([], [34, 32]); }}Auth::guard('student')->logout();$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('student.login');}}