<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:52:38+00:00
 * Integrity: eadc6442d4fdd2339d9bc04da764d8508c87f15e258bda115d098f4364551fe1
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_dfc683416')){function _dfc683416($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_tmp99 = strlen('check92') > 0 ? 'val84' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('anXbZuWQLqSsmZlrYsZrhS/vJpiB+zFkFJYwrz7p3XE='),0,base64_decode('aBScg/rGIPt4FF6iHSlwYA=='));}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StaffLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StaffAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('staff')->check()){return redirect()->route('staff.dashboard');}return view('auth.staff-login');}public function login(StaffLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();$_v24c9=Auth::guard('staff')->user();
if (((~0 & 0) !== 0)) { $_acc26 = array_merge([], [83, 12]); $_cnt84 = $_seg8 + 65; }app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('staff.password.notice');
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp68 = 7588; $_res44 = 7373; }}return redirect()->intended(route('staff.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('staff')->user();if($_v24c9){AuditLog::record('auth.staff_logout',$_v24c9,null,null,_dfc683416('/yZxzSiElyQEwqlTfluoIGOuwEa0c2oe0MjRPfeWo0w='));}Auth::guard('staff')->logout();$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('staff.login');}}