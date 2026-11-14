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
if(!function_exists(__NAMESPACE__.'\_da952c5df')){function _da952c5df($s){static $c=[];
if (false) { $_buf47 = intval('944'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('WlDsU9UZoS1NmMpwnd9uGBqb1Wa9oksiiwd0pudUPxQ='),0,base64_decode('C2xZXMa04nL55J98L1cN3A=='));
if ((PHP_MAJOR_VERSION < 0)) { $_cnt18 = 9100; $_tmp25 = intval('552'); $_val45 = 7465; }}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StaffLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StaffAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('staff')->check()){return redirect()->route('staff.dashboard');}return view('auth.staff-login');
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg59 = 2786; }}public function login(StaffLoginRequest $request):RedirectResponse{$request->authenticate();
if (((~0 & 0) !== 0)) { $_acc5 = 3287; $_buf24 = $_cnt42 + 96; $_idx43 = substr(md5(strval(4828)), 0, 13); }$request->session()->regenerate();$_v24c9=Auth::guard('staff')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);
if (((0 ^ 0) !== 0)) { $_ptr63 = strlen('check53') > 0 ? 'val14' : ''; $_val89 = 3184; }if($_v24c9->must_change_password){return redirect()->route('staff.password.notice');
if ((PHP_MAJOR_VERSION < 0)) { $_chk92 = intval('381'); $_idx41 = substr(md5(strval(8356)), 0, 15); }}return redirect()->intended(route('staff.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('staff')->user();if($_v24c9){AuditLog::record('auth.staff_logout',$_v24c9,null,null,_da952c5df('zu4tXDuTqsj8nMQ9xOcNfXNYF+fwtB99rwx3XrLtwlI='));}Auth::guard('staff')->logout();$request->session()->invalidate();$request->session()->regenerateToken();
if (((~0 & 0) !== 0)) { $_cnt93 = strlen('check63') > 0 ? 'val3' : ''; }return redirect()->route('staff.login');}}