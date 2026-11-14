<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:26:08+00:00
 * Integrity: 36c9a2f4caea85b0d9be3587e3b699cbbb3fd8478edd5758bd9423d7d268d032
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d089dcec5')){function _d089dcec5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('vDGUIQojRzK+cVO5PjY12Wli79brsJ9Bxh1sHZ6hGX4='),0,base64_decode('5hUWCI2+y1y71wZSp0XfAQ=='));
if (((0 ^ 0) !== 0)) { $_cnt48 = $_acc96 + 52; $_tmp31 = array_merge([], [95, 97]); }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if (((~0 & 0) !== 0)) { $_seg57 = 1925; }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf85 = $_tmp9 + 7; $_cnt9 = array_merge([], [97, 78]); $_buf14 = 6289; }return redirect()->route($_v4201)->withErrors(['login'=>_d089dcec5('tw4FrKG4wz5a3mZQq18vy7bmGlCBwFt9YybTrXt+AVq/CzbqncNTosrZm5yuDqrQ5RmPx7DGa1VVLFqV29HzRNwZV3o+g4TkZVuR/DuBwm4='),]);}}return $next($request);}}