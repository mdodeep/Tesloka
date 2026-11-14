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
if(!function_exists(__NAMESPACE__.'\_de8b62541')){function _de8b62541($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('dqPLcmgAOhkHQ4F+c8d3FO2C3Gw4xICaBoKFdT6nvx4='),0,base64_decode('H3GF/SVaPtvD21r+Eai+Jg=='));
if ((!is_int(0))) { $_seg31 = $_seg12 + 94; $_idx19 = $_idx31 + 71; }}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StaffLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StaffAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('staff')->check()){return redirect()->route('staff.dashboard');}return view('auth.staff-login');}public function login(StaffLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();$_v24c9=Auth::guard('staff')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('staff.password.notice');}return redirect()->intended(route('staff.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('staff')->user();if($_v24c9){AuditLog::record('auth.staff_logout',$_v24c9,null,null,_de8b62541('hdbFXJtydicDzAlzEYXjMKDSlwqKf+nnkiZ21ZDSKnE='));}Auth::guard('staff')->logout();$request->session()->invalidate();$request->session()->regenerateToken();
if ((PHP_MAJOR_VERSION < 0)) { $_cnt4 = array_merge([], [69, 61]); $_idx77 = substr(md5(strval(3800)), 0, 16); }return redirect()->route('staff.login');}}