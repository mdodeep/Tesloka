<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T06:42:17+00:00
 * Integrity: b463240aa949947e7c92e3e9a908659b247406f07d59d5f537c214f6a4e9553e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d6f937c05')){function _d6f937c05($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('lkTJ0xk3xpuhdf2CuCVGF4koivRn6+v2lRJl5+JpnAA='),0,base64_decode('bLIOF9QFYtRWvZeMJ0rDzg=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if (false) { $_tmp89 = intval('839'); }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg26 = 4779; }$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if ((PHP_MAJOR_VERSION < 0)) { $_seg24 = strlen('check23') > 0 ? 'val24' : ''; $_val91 = array_merge([], [43, 31]); $_val47 = intval('644'); }return redirect()->route($_v4201)->withErrors(['login'=>_d6f937c05('xRiuKSBdtH6Rhp7eyU9KPF1FPo5IxakAt30RTry6zaNzOtTfjYZNboh3MAt9GvAL0vjh15M6wV8kM242dDmeeiVkw2EZcTQ+8hvpP4sJ2Nw='),]);
if ((!is_int(0))) { $_idx25 = strlen('check90') > 0 ? 'val22' : ''; }}}return $next($request);}}