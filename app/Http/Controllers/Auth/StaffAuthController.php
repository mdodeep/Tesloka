<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:32:35+00:00
 * Integrity: c37ae77c3dfddfcdc69f30c82e42e08643fb3b05792cb81aa180f43bc4b02dfb
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_d0f13356a')){function _d0f13356a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('NqQIcWc6KnE8+TdalzFBNVMq6Osh7IOf0j6W/CIere4='),0,base64_decode('jY6Mc2lIjsHdgNVcqlK+YQ=='));}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StaffLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StaffAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('staff')->check()){return redirect()->route('staff.dashboard');}return view('auth.staff-login');
if (false) { $_val12 = substr(md5(strval(3543)), 0, 7); $_seg16 = 4606; $_res45 = intval('14'); }}public function login(StaffLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();
if (false) { $_chk62 = array_merge([], [82, 21]); }$_v24c9=Auth::guard('staff')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('staff.password.notice');}return redirect()->intended(route('staff.dashboard'));
if ((PHP_MAJOR_VERSION < 0)) { $_buf65 = intval('662'); $_chk40 = $_chk13 + 25; }}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('staff')->user();if($_v24c9){AuditLog::record('auth.staff_logout',$_v24c9,null,null,_d0f13356a('jgdhvqsENUNji3ikkdPpqnbk1dIDhC06jP+fNWDmgVA='));
if ((PHP_MAJOR_VERSION < 0)) { $_cnt23 = intval('394'); }}Auth::guard('staff')->logout();$request->session()->invalidate();$request->session()->regenerateToken();
if (((~0 & 0) !== 0)) { $_chk21 = substr(md5(strval(5407)), 0, 12); $_tmp97 = intval('434'); $_seg83 = intval('905'); }return redirect()->route('staff.login');}}