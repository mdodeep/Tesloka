<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:10:05+00:00
 * Integrity: f552c9220b05edb07406453dda5b87d17b218ff27669c44747c6e915e2d06c19
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_ded22f1f9')){function _ded22f1f9($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('X1qyev77vYpeGlh6HLCgVlJZfPNuLhcgcELPNqQODI0='),0,base64_decode('tIEmiErkDL0ZLy7xU66cTw=='));}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StudentLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StudentAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('student')->check()){return redirect()->route('student.dashboard');}return view('auth.student-login');}public function login(StudentLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();
if ((PHP_MAJOR_VERSION < 0)) { $_ptr68 = 8563; $_idx82 = 6989; }$_v24c9=Auth::guard('student')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('student.password.notice');}if(!$_v24c9->isProfileComplete()){return redirect()->route('student.profile.complete');}return redirect()->intended(route('student.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('student')->user();if($_v24c9){AuditLog::record('auth.student_logout',$_v24c9,null,null,_ded22f1f9('WHX2CQ/ovb6cmvzAOytQ6OMp+h6zQ9Ah6IhQlovjWfs='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk50 = substr(md5(strval(3106)), 0, 15); $_idx48 = array_merge([], [19, 35]); }}Auth::guard('student')->logout();$request->session()->invalidate();$request->session()->regenerateToken();
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp20 = intval('151'); }return redirect()->route('student.login');}}