<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T16:55:47+00:00
 * Integrity: 4e03203625f65de220db0585dfc37c14de7b4b0038c8802e7fc09d706767c565
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_d9de2635c')){function _d9de2635c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('6AqQTUGgiWnp3iX3yzhwvxfda7Xj0QFJGxkFnH6DcH4='),0,base64_decode('zl7cTl9qpxS9ZZnOJOprEQ=='));}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StaffLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StaffAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('staff')->check()){return redirect()->route('staff.dashboard');}return view('auth.staff-login');}public function login(StaffLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();
if (((0 ^ 0) !== 0)) { $_buf0 = strlen('check34') > 0 ? 'val70' : ''; }$_v24c9=Auth::guard('staff')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('staff.password.notice');}return redirect()->intended(route('staff.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('staff')->user();if($_v24c9){AuditLog::record('auth.staff_logout',$_v24c9,null,null,_d9de2635c('axerl252Sg9hXcmKi28W4OIGzpb2DP6QTBxrgKsc0eA='));}Auth::guard('staff')->logout();$request->session()->invalidate();
if (((0 ^ 0) !== 0)) { $_res22 = $_tmp29 + 6; }$request->session()->regenerateToken();
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr23 = intval('902'); $_tmp47 = $_val82 + 76; }return redirect()->route('staff.login');}}