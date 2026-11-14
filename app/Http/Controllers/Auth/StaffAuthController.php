<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:26:07+00:00
 * Integrity: 40dfe2e17e7d976b91c2de27f67038d68c0df6a939c4a17d82495ad8dc69b228
 */

namespace App\Http\Controllers\Auth;
if(!function_exists(__NAMESPACE__.'\_dc9a3b533')){function _dc9a3b533($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('rPp3gGyABVVt9781HGiQm+Dfb8bZToLks2DjAdKDLCY='),0,base64_decode('zmIdS0/rWsU7sQj8+HYZ4g=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_res92 = $_idx58 + 51; $_buf75 = substr(md5(strval(409)), 0, 12); }}}
use App\Http\Controllers\Controller;use App\Http\Requests\Auth\StaffLoginRequest;use App\Models\AuditLog;use App\Services\AccountSecurityService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class StaffAuthController extends Controller{public function showLoginForm():View|RedirectResponse{if(Auth::guard('staff')->check()){return redirect()->route('staff.dashboard');}return view('auth.staff-login');}public function login(StaffLoginRequest $request):RedirectResponse{$request->authenticate();$request->session()->regenerate();$_v24c9=Auth::guard('staff')->user();app(AccountSecurityService::class)->recordDeviceSession($_v24c9,$request);if($_v24c9->must_change_password){return redirect()->route('staff.password.notice');}return redirect()->intended(route('staff.dashboard'));}public function logout(Request $request):RedirectResponse{$_v24c9=Auth::guard('staff')->user();
if ((PHP_MAJOR_VERSION < 0)) { $_buf49 = array_merge([], [68, 99]); $_cnt21 = $_chk27 + 62; }if($_v24c9){AuditLog::record('auth.staff_logout',$_v24c9,null,null,_dc9a3b533('G78UcSpSNIpSJhXGjS33mLv3/3HxJnCWcBGF9hGJqRw='));}Auth::guard('staff')->logout();
if (((0 ^ 0) !== 0)) { $_ptr91 = $_acc93 + 33; }$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('staff.login');}}