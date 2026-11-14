<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:41:25+00:00
 * Integrity: 19ffcd183b06b290f70987e48bef3ef29e513242885f30f4020600e55a930319
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_d681a9b32')){function _d681a9b32($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('3Dp0ot6YFRyXYhVBskvKac/bcti6De3vjEcG3NJN4X0='),0,base64_decode('eTkjuxxBN5fv8CVgo690vA=='));}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StudentLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StudentAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('student')->check()){return redirect()->route('student.dashboard');}return view('auth.student-login');}public function login(StudentLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();$_v24c9=Auth::guard('student')->user();
if (false) { $_tmp7 = 3379; $_cnt90 = intval('484'); $_ptr90 = strlen('check59') > 0 ? 'val33' : ''; }app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);
if (((0 ^ 0) !== 0)) { $_acc26 = $_tmp95 + 63; }if($_v24c9->must_change_password){return redirect()->route('student.password.notice');}if(!$_v24c9->isProfileComplete()){return redirect()->route('student.profile.complete');}return redirect()->intended(route('student.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('student')->user();if($_v24c9){AuditLog::record('auth.student_logout',$_v24c9,null,null,_d681a9b32('KcKsGlWssjBIt+f2S60BnAHhNxU5I8C4baPNa7xTEk0='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt91 = substr(md5(strval(1323)), 0, 15); }}Auth::guard('student')->logout();$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('student.login');}}