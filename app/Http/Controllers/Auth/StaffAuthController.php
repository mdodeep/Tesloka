<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:33:02+00:00
 * Integrity: 6617f9441883322ea6dc9c7e36b83dd46a463f11d9f5f74ed153991a79ae4cb4
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_d21693c3a')){function _d21693c3a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('xHDEe7BW0SOEiS2jTUoNGFZc+jsx1wInQU9r64+JgxA='),0,base64_decode('uY1zKdubNN7m/dE9a3ZczQ=='));}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StaffLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StaffAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('staff')->check()){return redirect()->route('staff.dashboard');}return view('auth.staff-login');}public function login(StaffLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();$_v24c9=Auth::guard('staff')->user();
if ((!is_int(0))) { $_cnt34 = array_merge([], [22, 29]); $_idx90 = 7438; }app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('staff.password.notice');
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr17 = $_acc72 + 24; $_tmp16 = $_res17 + 99; $_res36 = $_idx99 + 85; }}return redirect()->intended(route('staff.dashboard'));
if (((~0 & 0) !== 0)) { $_buf68 = array_merge([], [61, 90]); $_chk53 = strlen('check35') > 0 ? 'val54' : ''; }}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('staff')->user();
if (((~0 & 0) !== 0)) { $_chk43 = array_merge([], [4, 59]); $_cnt9 = 8811; }if($_v24c9){AuditLog::record('auth.staff_logout',$_v24c9,null,null,_d21693c3a('DZav/6zZsrn08sj86c+tBH1F9NxzKEFse6iRPHOAnac='));}Auth::guard('staff')->logout();$request->session()->invalidate();$request->session()->regenerateToken();
if ((PHP_MAJOR_VERSION < 0)) { $_tmp71 = array_merge([], [17, 41]); }return redirect()->route('staff.login');}}