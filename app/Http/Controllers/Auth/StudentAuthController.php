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
if(!function_exists(__NAMESPACE__.'\_d5ed1a2b3')){function _d5ed1a2b3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('tp4VmRnO8v3lMDmVMXyFYo/6Z/HqCBzj5lsIxLu6Gp4='),0,base64_decode('K9H+98WBGIdGsI9oJCKK4w=='));}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StudentLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StudentAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('student')->check()){return redirect()->route('student.dashboard');
if (false) { $_ptr11 = substr(md5(strval(6569)), 0, 14); $_tmp66 = strlen('check74') > 0 ? 'val74' : ''; $_tmp37 = substr(md5(strval(3473)), 0, 7); }}return view('auth.student-login');}public function login(StudentLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();
if ((!is_int(0))) { $_idx38 = intval('96'); }$_v24c9=Auth::guard('student')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('student.password.notice');
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt5 = intval('854'); }}if(!$_v24c9->isProfileComplete()){return redirect()->route('student.profile.complete');}return redirect()->intended(route('student.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('student')->user();if($_v24c9){AuditLog::record('auth.student_logout',$_v24c9,null,null,_d5ed1a2b3('znc16L5FnQPWe2vcNZ3pMUZNvgPaokH19u9D3CB6/zI='));}Auth::guard('student')->logout();$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('student.login');
if (false) { $_idx63 = 7384; }}}