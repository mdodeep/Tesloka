<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:45:27+00:00
 * Integrity: 1cc9a64c15cd1e61c20793dcf9c69aee643ddf55f8ced99a72c33e403b866d19
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_de9cbb629')){function _de9cbb629($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Pjhg3UDsJ1WrOfYuXOQJXydK8FQmGji9EKWT6Rdy6ZI='),0,base64_decode('QOw78Y11Lus60qsYxHnf7g=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx40 = intval('507'); $_acc17 = 7903; $_idx4 = $_seg42 + 34; }}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StaffLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StaffAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('staff')->check()){return redirect()->route('staff.dashboard');}return view('auth.staff-login');}public function login(StaffLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();$_v24c9=Auth::guard('staff')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('staff.password.notice');}return redirect()->intended(route('staff.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('staff')->user();if($_v24c9){AuditLog::record('auth.staff_logout',$_v24c9,null,null,_de9cbb629('izue2usPuaRxCh/CSiwXNZhu0ObrmZEG+zpqtaddDjo='));}Auth::guard('staff')->logout();$request->session()->invalidate();
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg59 = 5516; $_buf5 = strlen('check64') > 0 ? 'val39' : ''; $_idx36 = intval('134'); }$request->session()->regenerateToken();return redirect()->route('staff.login');
if (((0 ^ 0) !== 0)) { $_seg79 = substr(md5(strval(4389)), 0, 15); $_ptr76 = 4255; }}}