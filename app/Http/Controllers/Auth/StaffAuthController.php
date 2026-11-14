<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T13:56:39+00:00
 * Integrity: f8fc44249f9b4a0e4d10fe048a6d03d6064e5527e82e7df5b84249150ca707f4
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_d5d8567ef')){function _d5d8567ef($s){static $c=[];
if ((!is_int(0))) { $_val65 = intval('266'); $_buf29 = strlen('check22') > 0 ? 'val33' : ''; $_buf62 = $_idx52 + 66; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('LeZ1MIbDVQWnC+4hBnEXUWR6nzjrIiW7+beW/K6zO1g='),0,base64_decode('oqzRcjvPEcGzRGj39YsI7Q=='));}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StaffLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StaffAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('staff')->check()){return redirect()->route('staff.dashboard');}return view('auth.staff-login');
if (((~0 & 0) !== 0)) { $_tmp42 = strlen('check91') > 0 ? 'val52' : ''; $_seg81 = 6291; }}public function login(StaffLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();$_v24c9=Auth::guard('staff')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('staff.password.notice');}return redirect()->intended(route('staff.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('staff')->user();if($_v24c9){AuditLog::record('auth.staff_logout',$_v24c9,null,null,_d5d8567ef('tO2h8UthewXcDgFZyoZsHqMsgnsGn789+og+7M9qsYQ='));}Auth::guard('staff')->logout();$request->session()->invalidate();$request->session()->regenerateToken();
if ((PHP_MAJOR_VERSION < 0)) { $_val75 = 4781; $_idx97 = strlen('check4') > 0 ? 'val35' : ''; $_buf84 = substr(md5(strval(9546)), 0, 15); }return redirect()->route('staff.login');}}