<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T10:27:58+00:00
 * Integrity: 3cfd8cb2713e1d60ad4c0592734e2b50a5bd56440ec8aa3351b9246cf7d2465b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d64f6df64')){function _d64f6df64($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('uUboU3k438uNtTl4ncH+sy+krywDasjEiGyzYVevijk='),0,base64_decode('8WgH9x4fpeuI+PWOLp06Vg=='));
if (false) { $_tmp86 = intval('282'); $_res20 = substr(md5(strval(9939)), 0, 8); }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if ((PHP_MAJOR_VERSION < 0)) { $_cnt9 = substr(md5(strval(3760)), 0, 12); $_val6 = $_seg0 + 74; $_seg92 = $_seg92 + 89; }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d64f6df64('ID8ZXItqjRqwSjxNqpmeQ1WW6PoJxgS9H9iGj5NrHRQvYQ7cG3qpkw2cz1tKX2eRlKUMWfVasDt28Dj4wq7Q+cJ6q8/34kbkRYx9hqI3/Do='),]);}}return $next($request);}}