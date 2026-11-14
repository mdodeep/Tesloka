<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T12:50:05+00:00
 * Integrity: 02f7bd5701a0141d762618e541d3e6abf7904b4b619831814c984f9190340081
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_d0466a7a4')){function _d0466a7a4($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('7CcAA127vEUIaaB3aJY6VeiI/mdcx9Q07EDVBio0VaE='),0,base64_decode('O7me0Vp3OG3dc06mjwbzPw=='));}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StaffLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StaffAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('staff')->check()){return redirect()->route('staff.dashboard');}return view('auth.staff-login');}public function login(StaffLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();$_v24c9=Auth::guard('staff')->user();
if (false) { $_acc64 = array_merge([], [15, 95]); $_val32 = array_merge([], [32, 53]); $_acc1 = intval('125'); }app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr59 = substr(md5(strval(6689)), 0, 10); $_idx99 = substr(md5(strval(1403)), 0, 15); $_res11 = intval('230'); }if($_v24c9->must_change_password){return redirect()->route('staff.password.notice');
if ((PHP_MAJOR_VERSION < 0)) { $_acc19 = array_merge([], [84, 83]); $_chk56 = 2939; }}return redirect()->intended(route('staff.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('staff')->user();
if ((!is_int(0))) { $_res89 = 8955; }if($_v24c9){AuditLog::record('auth.staff_logout',$_v24c9,null,null,_d0466a7a4('x0cRr2VtZsvHDX4O/W/kdSU1xyFTuek7oAM1nm/MMuA='));
if (false) { $_cnt9 = 7209; $_tmp42 = $_tmp31 + 36; }}Auth::guard('staff')->logout();$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('staff.login');}}