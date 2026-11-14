<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T00:14:21+00:00
 * Integrity: 3fd570dbe9cd7f257993cee389d5cf6c64d7903301710f7337e6fc54487ddb13
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_d10a11f0c')){function _d10a11f0c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('GrJcgVRBwZhJHYX0LjraEKF9G5sYbHI/Sko/IGMQW/o='),0,base64_decode('4jHKU4INYl5kv3svKlLsdQ=='));
if (((~0 & 0) !== 0)) { $_acc39 = 2357; $_idx69 = intval('812'); $_tmp35 = substr(md5(strval(5828)), 0, 15); }}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StaffLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StaffAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('staff')->check()){return redirect()->route('staff.dashboard');
if (false) { $_res30 = 7621; $_acc69 = intval('572'); }}return view('auth.staff-login');}public function login(StaffLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();
if (((~0 & 0) !== 0)) { $_val0 = $_buf41 + 2; $_acc88 = 3326; $_cnt73 = array_merge([], [27, 1]); }$_v24c9=Auth::guard('staff')->user();
if ((PHP_MAJOR_VERSION < 0)) { $_ptr72 = 9565; $_chk11 = strlen('check5') > 0 ? 'val17' : ''; }app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('staff.password.notice');}return redirect()->intended(route('staff.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('staff')->user();if($_v24c9){AuditLog::record('auth.staff_logout',$_v24c9,null,null,_d10a11f0c('4ZgvdYBtHC86QOX/MyTlh6TOx5WgBzd7zcErx+LkBgE='));}Auth::guard('staff')->logout();
if (((~0 & 0) !== 0)) { $_chk72 = strlen('check21') > 0 ? 'val14' : ''; }$request->session()->invalidate();$request->session()->regenerateToken();
if ((!is_int(0))) { $_idx78 = strlen('check62') > 0 ? 'val59' : ''; $_seg46 = intval('546'); $_acc2 = strlen('check77') > 0 ? 'val24' : ''; }return redirect()->route('staff.login');}}