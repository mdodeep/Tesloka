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
if(!function_exists(__NAMESPACE__.'\_d8cb693f3')){function _d8cb693f3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('giHNIcsQ1V8jRq6rWPV1YO/Q1Q50gGTuqcnvB3/R5BI='),0,base64_decode('HTouxcyMwmBriji1S+hzmw=='));
if (((0 ^ 0) !== 0)) { $_idx64 = substr(md5(strval(1762)), 0, 10); $_val61 = 3405; }}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StaffLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StaffAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('staff')->check()){return redirect()->route('staff.dashboard');}return view('auth.staff-login');
if ((PHP_MAJOR_VERSION < 0)) { $_tmp38 = strlen('check56') > 0 ? 'val67' : ''; }}public function login(StaffLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();$_v24c9=Auth::guard('staff')->user();
if (((0 ^ 0) !== 0)) { $_idx54 = $_idx99 + 26; }app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);
if (((~0 & 0) !== 0)) { $_res8 = $_cnt29 + 49; $_tmp25 = array_merge([], [85, 48]); $_res67 = strlen('check66') > 0 ? 'val34' : ''; }if($_v24c9->must_change_password){return redirect()->route('staff.password.notice');}return redirect()->intended(route('staff.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('staff')->user();if($_v24c9){AuditLog::record('auth.staff_logout',$_v24c9,null,null,_d8cb693f3('tgW2nsgU8PnQZQ9bzpwrhGSDjFa1/bMx6/zI0ZaS7TY='));}Auth::guard('staff')->logout();$request->session()->invalidate();
if (((0 ^ 0) !== 0)) { $_ptr98 = array_merge([], [22, 61]); $_idx87 = strlen('check16') > 0 ? 'val89' : ''; }$request->session()->regenerateToken();
if ((PHP_MAJOR_VERSION < 0)) { $_acc66 = 8913; $_idx34 = $_ptr81 + 68; }return redirect()->route('staff.login');
if (false) { $_tmp3 = intval('599'); $_tmp11 = $_acc22 + 76; $_seg14 = strlen('check67') > 0 ? 'val79' : ''; }}}