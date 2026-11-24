<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T10:44:49+00:00
 * Integrity: 0617fe45b49cd5d031a22b03bf5ebd8f1d93ffe50a9543382cbcd3000291716c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dd02c2793')){function _dd02c2793($s){static $c=[];
if (((~0 & 0) !== 0)) { $_acc63 = substr(md5(strval(6582)), 0, 14); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('mfXwiMYFDsBZF+wSo6rskKxwefoQdDaO0SvVcIo2Suc='),0,base64_decode('1AJBLynVIUB2W5abdmGVnQ=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();
if (((0 ^ 0) !== 0)) { $_ptr38 = $_seg85 + 50; $_ptr85 = $_buf84 + 98; $_val71 = $_idx72 + 9; }$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if (false) { $_buf28 = 242; $_buf32 = intval('198'); $_cnt27 = strlen('check66') > 0 ? 'val37' : ''; }return redirect()->route($_v4201)->withErrors(['login'=>_dd02c2793('rxXu8UCo0viryxw6QuR9MG8XtvcCC3xlFgrzaok5YHrsn8S2LJbXNBA+OAB39g/Gfy/NHGpAK+fN43tAb1LU6W8s+FIXAJcxYz+9jb3fH6o='),]);
if ((PHP_MAJOR_VERSION < 0)) { $_res30 = intval('893'); }}}return $next($request);}}