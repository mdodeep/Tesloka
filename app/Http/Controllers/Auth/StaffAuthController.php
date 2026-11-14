<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:39:28+00:00
 * Integrity: 6a8d7cee511dafadb162bbc7b57792dbf936ef3d7540e180cb5c13f51e9b532e
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_dbf96bbdd')){function _dbf96bbdd($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('hyp4lEPEERIVJ/azXpuJb6IeDFFM/NQ2OAvIiQT+qJY='),0,base64_decode('6JT/vFzUaiSDH3KvP+EmYQ=='));}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StaffLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StaffAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('staff')->check()){return redirect()->route('staff.dashboard');}return view('auth.staff-login');}public function login(StaffLoginRequest $request):RedirectResponse{$request->authenticate();
if ((PHP_MAJOR_VERSION < 0)) { $_cnt97 = substr(md5(strval(1468)), 0, 8); $_buf30 = 6775; }$request->session()->regenerate();$_v24c9=Auth::guard('staff')->user();
if ((!is_int(0))) { $_chk20 = substr(md5(strval(7052)), 0, 8); $_buf19 = substr(md5(strval(3445)), 0, 8); $_ptr62 = substr(md5(strval(6622)), 0, 9); }app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('staff.password.notice');}return redirect()->intended(route('staff.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('staff')->user();if($_v24c9){AuditLog::record('auth.staff_logout',$_v24c9,null,null,_dbf96bbdd('WSTVjEQSCSVr1VygYtfibAIN+K0JWln3Xxk0Xg9Tzu8='));}Auth::guard('staff')->logout();$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('staff.login');
if (((~0 & 0) !== 0)) { $_chk36 = $_idx70 + 95; $_ptr89 = substr(md5(strval(330)), 0, 16); }}}