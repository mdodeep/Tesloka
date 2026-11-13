<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T09:24:25+00:00
 * Integrity: 538a45338bd1018a11c642d0f3358955b956c4f78fc5eb36b689fcf487b88d6c
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_d0d2813e3')){function _d0d2813e3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('+Fern59iab428/rEAteVaFabA4DD4S6wy1YLr1H4DH8='),0,base64_decode('4nOe0jWTu99Q+qHwyEQbrA=='));}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StaffLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StaffAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('staff')->check()){return redirect()->route('staff.dashboard');}return view('auth.staff-login');
if ((!is_int(0))) { $_cnt85 = 8426; $_idx28 = strlen('check72') > 0 ? 'val21' : ''; }}public function login(StaffLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();$_v24c9=Auth::guard('staff')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('staff.password.notice');}return redirect()->intended(route('staff.dashboard'));
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp58 = substr(md5(strval(772)), 0, 6); $_ptr89 = intval('417'); $_tmp42 = intval('42'); }}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('staff')->user();if($_v24c9){AuditLog::record('auth.staff_logout',$_v24c9,null,null,_d0d2813e3('/4DH7JePHSSXSDYxKdf3yOnF5E/WN4ZrA+3EjD9esTU='));}Auth::guard('staff')->logout();$request->session()->invalidate();
if (((0 ^ 0) !== 0)) { $_buf25 = intval('129'); }$request->session()->regenerateToken();return redirect()->route('staff.login');}}