<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T15:39:43+00:00
 * Integrity: 0fdf13291d07f0e42301c8c3306b05ab598cd2c738e47ff0d4f9093778ec66c3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_daae6ec21')){function _daae6ec21($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_seg22 = $_seg41 + 10; $_val61 = intval('72'); $_tmp31 = array_merge([], [18, 93]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('zSTxpIAkQCX+KywGt7htoOUWAomtNB/PYpJpLGxP+9s='),0,base64_decode('pOuEpl9Hju7TRvYVvxgLdg=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr87 = 492; $_acc95 = 2492; }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_daae6ec21('B/ggbEuv+JY12grjJQSdVOxGw2tMw+TY3D+bZQKJyIwAUVJdmoqu9sZsKJZ9U4hSkCeKoVh9KlEtifiBIQ/aMBKi58GKeJ2dbnXYct/XmmY='),]);}}return $next($request);}}