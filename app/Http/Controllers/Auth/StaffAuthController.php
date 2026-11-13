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
if(!function_exists(__NAMESPACE__.'\_d8d7fa104')){function _d8d7fa104($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg59 = intval('881'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('2VZkS2/JEr6PDR8qtqa0z/t9SHOP4IdBGxwARaVIZMo='),0,base64_decode('KwcR/BMFmF399muXPTSRZw=='));}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StaffLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StaffAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('staff')->check()){return redirect()->route('staff.dashboard');}return view('auth.staff-login');}public function login(StaffLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();$_v24c9=Auth::guard('staff')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('staff.password.notice');}return redirect()->intended(route('staff.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('staff')->user();if($_v24c9){AuditLog::record('auth.staff_logout',$_v24c9,null,null,_d8d7fa104('yLsLTq7QFDvvG45fud7Iwit/Kzj5iKwYTZlxPipZCVY='));}Auth::guard('staff')->logout();$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('staff.login');
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr53 = array_merge([], [96, 88]); $_val87 = array_merge([], [71, 66]); }}}