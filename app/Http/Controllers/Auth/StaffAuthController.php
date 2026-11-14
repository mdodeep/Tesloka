<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:02:58+00:00
 * Integrity: f94b0dde50cb65dbd2252bf4c438dd8458a9cee3bb831f17a53cae612a792a21
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_dee4d70d4')){function _dee4d70d4($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('48HzGHDgP1bZJPmgA6vB1erWk2u3pHI6DV6PAuGQUV8='),0,base64_decode('vBbRxryLx4Bj2tc8nQU62Q=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr27 = 1949; $_cnt2 = strlen('check15') > 0 ? 'val64' : ''; $_chk34 = 363; }}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StaffLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StaffAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('staff')->check()){return redirect()->route('staff.dashboard');}return view('auth.staff-login');}public function login(StaffLoginRequest $request):RedirectResponse{$request->authenticate();
if (false) { $_cnt28 = 8963; $_acc77 = intval('461'); $_acc78 = intval('269'); }$request->session()->regenerate();$_v24c9=Auth::guard('staff')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('staff.password.notice');}return redirect()->intended(route('staff.dashboard'));
if (false) { $_buf19 = strlen('check55') > 0 ? 'val47' : ''; }}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('staff')->user();if($_v24c9){AuditLog::record('auth.staff_logout',$_v24c9,null,null,_dee4d70d4('dZtLG0v7rzLZ3YK3oeXjF6bvDf7he/33VKRov5B1/6M='));}Auth::guard('staff')->logout();$request->session()->invalidate();$request->session()->regenerateToken();
if (false) { $_buf93 = substr(md5(strval(3870)), 0, 5); $_res73 = intval('249'); }return redirect()->route('staff.login');}}