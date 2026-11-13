<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T11:11:46+00:00
 * Integrity: 5d626f927626e30bbb029585cc2b952e833cbb0960c514073574a2e69334b2a0
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_d572f82ad')){function _d572f82ad($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('TM/ojzKPenOHCBEbAYvIQSIkAsGZQP2rMLmOYTKqrW0='),0,base64_decode('ozneA6I8TUkVtRCQkEqLLg=='));}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StudentLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StudentAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('student')->check()){return redirect()->route('student.dashboard');
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc19 = strlen('check52') > 0 ? 'val36' : ''; $_res94 = 2285; }}return view('auth.student-login');}public function login(StudentLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();
if (((PHP_INT_SIZE * 0) !== 0)) { $_val24 = substr(md5(strval(4706)), 0, 15); }$_v24c9=Auth::guard('student')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);
if (((~0 & 0) !== 0)) { $_buf15 = intval('372'); }if($_v24c9->must_change_password){return redirect()->route('student.password.notice');}if(!$_v24c9->isProfileComplete()){return redirect()->route('student.profile.complete');}return redirect()->intended(route('student.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('student')->user();
if ((!is_int(0))) { $_idx92 = intval('68'); }if($_v24c9){AuditLog::record('auth.student_logout',$_v24c9,null,null,_d572f82ad('bOUhNLuJVszZ8w7To5FVvvx2Hcv6MLyJABnR0pF6oWY='));}Auth::guard('student')->logout();$request->session()->invalidate();$request->session()->regenerateToken();
if ((PHP_MAJOR_VERSION < 0)) { $_ptr6 = strlen('check32') > 0 ? 'val25' : ''; $_seg92 = $_ptr75 + 40; }return redirect()->route('student.login');}}