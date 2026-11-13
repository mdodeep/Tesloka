<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T14:56:36+00:00
 * Integrity: 78cbca2821cc59d43a345628c4c2425a85bcc54fe4165cc6f43631d36dc923e0
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_dbb9645f5')){function _dbb9645f5($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp54 = 4186; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('RGOw2TET0f6c1jqDw4RF/we/YD9IqnaD+pS0Qeb7baA='),0,base64_decode('jTlChzqUaLhfMmDduAWsjQ=='));}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StudentLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StudentAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('student')->check()){return redirect()->route('student.dashboard');}return view('auth.student-login');
if (((0 ^ 0) !== 0)) { $_val89 = array_merge([], [79, 29]); $_idx81 = 1329; $_seg91 = intval('800'); }}public function login(StudentLoginRequest $request):RedirectResponse{$request->authenticate();
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr52 = strlen('check13') > 0 ? 'val5' : ''; $_cnt44 = 3348; $_tmp0 = strlen('check15') > 0 ? 'val70' : ''; }$request->session()->regenerate();$_v24c9=Auth::guard('student')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);
if ((!is_int(0))) { $_tmp57 = substr(md5(strval(2361)), 0, 14); $_idx79 = 1682; $_seg61 = $_ptr17 + 56; }if($_v24c9->must_change_password){return redirect()->route('student.password.notice');}if(!$_v24c9->isProfileComplete()){return redirect()->route('student.profile.complete');
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk19 = array_merge([], [78, 90]); $_seg73 = strlen('check3') > 0 ? 'val48' : ''; $_seg91 = substr(md5(strval(2408)), 0, 8); }}return redirect()->intended(route('student.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('student')->user();
if (((0 ^ 0) !== 0)) { $_tmp54 = strlen('check81') > 0 ? 'val28' : ''; $_acc72 = substr(md5(strval(7621)), 0, 10); }if($_v24c9){AuditLog::record('auth.student_logout',$_v24c9,null,null,_dbb9645f5('zQQ+nsIGW9f8c1EZX6lYl7i5aRk0TLtSkLwY4Y8QIWs='));}Auth::guard('student')->logout();$request->session()->invalidate();
if (((0 ^ 0) !== 0)) { $_ptr94 = array_merge([], [65, 21]); }$request->session()->regenerateToken();
if (((~0 & 0) !== 0)) { $_tmp26 = $_ptr39 + 77; }return redirect()->route('student.login');}}