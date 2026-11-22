<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T08:25:42+00:00
 * Integrity: bdf411897d6e92d2c062c00df8c8159ae397421da420a7f909e77fb6460130be
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d174fa45c')){function _d174fa45c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ydjqylUBeHp4YUub9oO1XUcdZHh/tLyD/KRUykzsdbQ='),0,base64_decode('4kTVN5TxBOkrhyF9mI4PCA=='));
if (false) { $_val68 = intval('480'); $_seg99 = $_idx63 + 69; $_val15 = 7391; }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();
if (((~0 & 0) !== 0)) { $_idx59 = substr(md5(strval(5644)), 0, 7); }$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d174fa45c('r1YuAE7lHDGkvO2Xav1uvnfEQmvUnUNrZtMl0T3S0kollTg38HyHc0AjHMEi7N6+8SGDQ7xcFvyVaCzwuXSkcjjhBqZx1FcwV2J9mFx3pCE='),]);}}return $next($request);}}