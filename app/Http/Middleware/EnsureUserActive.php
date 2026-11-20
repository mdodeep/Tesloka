<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T23:50:51+00:00
 * Integrity: 69d7fbbda759854011d62cb7beb30af0765144337ca67cd655825eb5efe13bc4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d822b50ca')){function _d822b50ca($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_res52 = intval('341'); $_res73 = 4137; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('oSewYZaWCuW0TizHb6Pyd9bvhMZfN5bWq+VFqKDY7u8='),0,base64_decode('1QEFBrDuTYEw3wKvoTeKLQ=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();
if (((~0 & 0) !== 0)) { $_chk99 = intval('7'); $_idx60 = substr(md5(strval(5281)), 0, 15); $_tmp33 = substr(md5(strval(7444)), 0, 5); }$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d822b50ca('43GivYRBlan/D29CYf/w9VPZfWdH3iH76m90wzTSs4DUsTDnSDiyJafUHM0hxWy3izMj5p6Q6wKkfh5zT1pHEpdUATxSz0Kw6S2YjRlfuYI='),]);}}return $next($request);}}