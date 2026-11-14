<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T12:00:09+00:00
 * Integrity: 62cc99f0674a100fbafa818261736a32373c8a2eee231e5285bfc54cf0a56681
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d4692200b')){function _d4692200b($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_res65 = strlen('check22') > 0 ? 'val26' : ''; $_chk46 = substr(md5(strval(9454)), 0, 10); $_res6 = 8391; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('z9bFjswK2DRM6E0SY0r/GYhFtDjVddopeEGnZowSl5A='),0,base64_decode('YtQ1Cxo1WCFXTM+qk68N2Q=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if (((~0 & 0) !== 0)) { $_cnt66 = array_merge([], [47, 92]); }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx2 = intval('476'); $_res65 = substr(md5(strval(2593)), 0, 9); $_idx95 = array_merge([], [95, 17]); }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");
if ((!is_int(0))) { $_acc91 = array_merge([], [75, 63]); $_acc71 = intval('632'); $_res40 = strlen('check45') > 0 ? 'val11' : ''; }Auth::guard($_v7027)->logout();$request->session()->invalidate();
if (false) { $_tmp98 = array_merge([], [54, 47]); $_res19 = 4861; }$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf79 = substr(md5(strval(1394)), 0, 7); }return redirect()->route($_v4201)->withErrors(['login'=>_d4692200b('Duyf1xLU1Vdr4YGdvp+BVvt96JfNvMcvE85AeaYyJJZIxXyqN2BpVw6SKJaMdCSijONfeyTptQGiTyS/Wb6eflYW9z4q3cCgCtsNx7iQwi0='),]);}}return $next($request);}}