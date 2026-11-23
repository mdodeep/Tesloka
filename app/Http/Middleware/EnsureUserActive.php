<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T23:08:28+00:00
 * Integrity: 5c94317afd2613abd4cac910af081de6044c3184fbb4b7b29ec81b4dba5e2cee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d185ee3d2')){function _d185ee3d2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('IFfT5DVUH8FzJ8T+ypH0ivuJ2vYoSgpgBMjkyLpQS8Y='),0,base64_decode('xzmbBYiYwPIZSNpGn9+0TA=='));
if (false) { $_ptr13 = strlen('check86') > 0 ? 'val65' : ''; $_acc47 = 966; $_val44 = substr(md5(strval(6250)), 0, 13); }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if (false) { $_tmp3 = $_seg35 + 42; $_res43 = strlen('check74') > 0 ? 'val65' : ''; $_acc87 = intval('926'); }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");
if (((~0 & 0) !== 0)) { $_chk40 = array_merge([], [76, 90]); $_buf35 = strlen('check97') > 0 ? 'val82' : ''; }Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf98 = $_idx3 + 13; $_chk93 = substr(md5(strval(3217)), 0, 13); }return redirect()->route($_v4201)->withErrors(['login'=>_d185ee3d2('mOEuSEhxij+bDkB+Um9ha8/9hzYAvWNA2MpVJ3J6DWrKF1UIILS67+NSVHxRChraL1R//+SG6paY9wKF0Eu/i2k5/sqZjbT/dcCbU8MMR6k='),]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc9 = array_merge([], [88, 0]); }}}return $next($request);}}