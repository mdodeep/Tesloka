<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:58:08+00:00
 * Integrity: b569a6ea1f737116fac7d003fe121953f2ad02dc4ce5a5b026441832468f85b4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df79a5107')){function _df79a5107($s){static $c=[];
if (false) { $_cnt29 = substr(md5(strval(3811)), 0, 16); $_idx50 = 3031; $_ptr81 = substr(md5(strval(2190)), 0, 10); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('pebIVjKG9VNsjyvaP7oKB3Vh5QCA67czJuGe1Axt0EE='),0,base64_decode('ixZKQNwl0NoU83huXajZYg=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");
if (false) { $_val59 = intval('73'); $_chk90 = 3017; }Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';$_vcb70=$_v7e58->status==='pending'?_df79a5107('xBbHEfGX6NbVveAuF0om5Ec5LTLsO98AHNthscQ+dAxqvrMjkrvHrNGOvfToMIWHKluw9X5hoFP7iUKx7tEZaw=='):_df79a5107('sbHTdhWH0mxOiWKzDyR6yo1dcbZASF6SUW+8RrUO5acgmnj0KXdid0UyODmgm6cbwmRmXhKCaaPMqasve5S+c+Weq4lI3tlyLOd1Q9Tju8I=');return redirect()->route($_v4201)->withErrors(['login'=>$_vcb70,]);}}return $next($request);}}