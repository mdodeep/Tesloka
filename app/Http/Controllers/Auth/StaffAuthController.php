<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:29:48+00:00
 * Integrity: 646ef374be848d293e083b6b2a0a820665afd85534a62a2a5b37d8f15f2e794b
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_dbc23e4f9')){function _dbc23e4f9($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('q5Yw5TOlVS2BJ/2710It5E0NoFBX8MpoADpCzsTS43c='),0,base64_decode('SYKv+qjm8EPSces48ITqEA=='));}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StaffLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StaffAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('staff')->check()){return redirect()->route('staff.dashboard');}return view('auth.staff-login');}public function login(StaffLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();
if (((~0 & 0) !== 0)) { $_idx40 = $_buf92 + 86; $_val35 = substr(md5(strval(6020)), 0, 8); $_chk89 = intval('677'); }$_v24c9=Auth::guard('staff')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('staff.password.notice');}return redirect()->intended(route('staff.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('staff')->user();if($_v24c9){AuditLog::record('auth.staff_logout',$_v24c9,null,null,_dbc23e4f9('OSIUXnS3DHiK+guZeUXGblUx4rv1NdrSQdmjYph1jUU='));}Auth::guard('staff')->logout();
if (((~0 & 0) !== 0)) { $_ptr60 = 2158; $_chk77 = 7421; }$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('staff.login');}}