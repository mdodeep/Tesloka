<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T12:00:08+00:00
 * Integrity: f3620bfb51022cb0c646a14d4f40738b18bffb8f93ad04914a74bcf3375d758b
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_d47b8cd3e')){function _d47b8cd3e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('TAxAe/yRPM2mznwcbtOxp8n3XeJC5JsEFOz6g26Y3eI='),0,base64_decode('JXIUSm0smlmfbP9GT14KqA=='));}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StudentLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StudentAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('student')->check()){return redirect()->route('student.dashboard');}return view('auth.student-login');}public function login(StudentLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();$_v24c9=Auth::guard('student')->user();
if (false) { $_cnt93 = 5788; $_chk65 = 1033; $_buf3 = strlen('check50') > 0 ? 'val14' : ''; }app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('student.password.notice');
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt23 = intval('689'); $_res71 = 89; }}if(!$_v24c9->isProfileComplete()){return redirect()->route('student.profile.complete');
if (((~0 & 0) !== 0)) { $_ptr55 = intval('600'); $_idx75 = 8366; $_idx78 = $_ptr58 + 67; }}return redirect()->intended(route('student.dashboard'));
if (((0 ^ 0) !== 0)) { $_ptr60 = 5492; $_idx68 = substr(md5(strval(8416)), 0, 16); $_val12 = array_merge([], [61, 1]); }}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('student')->user();if($_v24c9){AuditLog::record('auth.student_logout',$_v24c9,null,null,_d47b8cd3e('+fu/kElygmTwZUn1FlBAPHFfC8mANjL8p1icWg1lg4w='));
if (false) { $_tmp87 = array_merge([], [89, 11]); $_idx1 = 1784; }}Auth::guard('student')->logout();$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('student.login');}}