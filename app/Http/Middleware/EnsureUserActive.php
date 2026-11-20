<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T21:34:56+00:00
 * Integrity: 1616d70ea295bee04dbd2667613704e9a193fe91f5bd7deff383c04143dd6e93
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2b75a33a')){function _d2b75a33a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('N2ZNRbeXdxEVI/biC4SjbwJY1dLb4ei48WQeFvI07jo='),0,base64_decode('+NUJqLYmh+4fDvTWJ8LMYQ=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d2b75a33a('OGgPBJ2A2C1BuKSf5xHHBb7IdZuOKdsS46SS5koIVn6aNGnzISH0W07nzXX4rWd6yJscijiEiD6JQZAxyikRIvnIuT8/zzehCU2rQIbHcqc='),]);}}return $next($request);}}