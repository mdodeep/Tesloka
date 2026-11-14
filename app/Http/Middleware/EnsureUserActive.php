<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:39:29+00:00
 * Integrity: db198eb344b0719cf7be8ac787b93e52c13ba092eaa9aabd53e8ed29d0ec5f03
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9271e372')){function _d9271e372($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('fXr+XMpZcB+ReFxb5/QD3cORx4h7Z+UnGE5PaUs8SU8='),0,base64_decode('JVWWmoBRmsFIdDTNA19VdA=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if (false) { $_chk75 = array_merge([], [62, 39]); $_acc4 = intval('988'); }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx55 = $_tmp63 + 91; $_chk13 = array_merge([], [20, 75]); }return redirect()->route($_v4201)->withErrors(['login'=>_d9271e372('cQLb0yYROuTDqh2QZMdJ0wVgwgWhmgShvkvM8hbWfKZ7k4uTYEwwUA+S77cAKynfd8+o6Kuagw2h8ut+4C5EOhYTb8vdcIKzX3HZ398ziuA='),]);
if (false) { $_res3 = strlen('check34') > 0 ? 'val22' : ''; $_seg2 = 5447; $_buf35 = $_cnt91 + 80; }}}return $next($request);}}