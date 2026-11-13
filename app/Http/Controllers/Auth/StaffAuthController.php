<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T10:25:07+00:00
 * Integrity: ed995c81e28fa02e1a6f329ac1d5ad5603084540759db7883a3c60a32583f05c
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_d0cf76fac')){function _d0cf76fac($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('YM/uW+i0oDEPwarMBaB4jkGDbrhI12yyuKwiYMhYn+w='),0,base64_decode('oWsYN78zf9HP42XrrqkXUw=='));}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StaffLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StaffAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('staff')->check()){return redirect()->route('staff.dashboard');
if (false) { $_chk2 = 6145; $_acc10 = array_merge([], [81, 6]); $_ptr58 = 5290; }}return view('auth.staff-login');}public function login(StaffLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();$_v24c9=Auth::guard('staff')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('staff.password.notice');}return redirect()->intended(route('staff.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('staff')->user();
if (((~0 & 0) !== 0)) { $_tmp40 = 4439; }if($_v24c9){AuditLog::record('auth.staff_logout',$_v24c9,null,null,_d0cf76fac('i33z8pgBGt0wYQ1WHzFAdrNiVFMm3Yz7rkuVND0HSk0='));
if ((PHP_MAJOR_VERSION < 0)) { $_acc86 = strlen('check92') > 0 ? 'val97' : ''; }}Auth::guard('staff')->logout();$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('staff.login');}}