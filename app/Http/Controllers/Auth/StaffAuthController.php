<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T11:41:37+00:00
 * Integrity: 0cec03c586bcf19479391769ea46e8473f871804b0c49d436bd104c77c979c26
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_dc1e343c7')){function _dc1e343c7($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc11 = 1452; $_res5 = array_merge([], [52, 9]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('5KmkMoL5kFDOPIg73LflF+8nNzahuUW0JLLekYi87vU='),0,base64_decode('JpgJ+PFOOdeS9l+mDuMbsA=='));}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StaffLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StaffAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('staff')->check()){return redirect()->route('staff.dashboard');
if (((0 ^ 0) !== 0)) { $_tmp7 = substr(md5(strval(8066)), 0, 16); }}return view('auth.staff-login');}public function login(StaffLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();$_v24c9=Auth::guard('staff')->user();
if ((PHP_MAJOR_VERSION < 0)) { $_ptr78 = strlen('check58') > 0 ? 'val97' : ''; $_res13 = array_merge([], [96, 56]); }app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('staff.password.notice');}return redirect()->intended(route('staff.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('staff')->user();if($_v24c9){AuditLog::record('auth.staff_logout',$_v24c9,null,null,_dc1e343c7('Hl0WWU65pC2n9s3UK+rSXr3oSozu66Drx+VfcuRgC78='));}Auth::guard('staff')->logout();$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('staff.login');}}