<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T12:00:08+00:00
 * Integrity: f3620bfb51022cb0c646a14d4f40738b18bffb8f93ad04914a74bcf3375d758b
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_d99cad7af')){function _d99cad7af($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('W3pCS/Ueq0A4kg59dAgWkryg/72pyB88pE3AYwHIYjE='),0,base64_decode('3r3q2ZPt49Atf1L5rHmGIg=='));}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StaffLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StaffAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('staff')->check()){return redirect()->route('staff.dashboard');}return view('auth.staff-login');
if (((~0 & 0) !== 0)) { $_tmp29 = 6427; }}public function login(StaffLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();$_v24c9=Auth::guard('staff')->user();
if ((!is_int(0))) { $_buf78 = strlen('check7') > 0 ? 'val55' : ''; $_seg40 = $_ptr73 + 81; $_val10 = intval('865'); }app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('staff.password.notice');}return redirect()->intended(route('staff.dashboard'));
if (((PHP_INT_SIZE * 0) !== 0)) { $_res49 = 4684; $_acc61 = array_merge([], [68, 35]); }}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('staff')->user();
if ((!is_int(0))) { $_buf21 = $_acc71 + 32; $_seg67 = array_merge([], [77, 29]); }if($_v24c9){AuditLog::record('auth.staff_logout',$_v24c9,null,null,_d99cad7af('9Qd8Z29ONNHN+O6CItwfhFHYQLDqA6JnMm0eODmFmeA='));
if ((!is_int(0))) { $_ptr39 = array_merge([], [32, 47]); $_seg33 = array_merge([], [6, 68]); $_res2 = intval('843'); }}Auth::guard('staff')->logout();
if (((0 ^ 0) !== 0)) { $_tmp86 = $_cnt15 + 44; }$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('staff.login');
if ((PHP_MAJOR_VERSION < 0)) { $_ptr98 = array_merge([], [52, 13]); }}}