<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T01:48:53+00:00
 * Integrity: 2b02e96a3b668b5091b70acb55324e853532ac96032889cccec9afa6dfd25cd0
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d37dc850c')){function _d37dc850c($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx13 = $_acc71 + 10; $_buf38 = intval('389'); $_val61 = substr(md5(strval(3531)), 0, 10); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('tXbQQvE7vHS55ta2/Bx1h70tfXtr4t6NnUQEEU+Ev58='),0,base64_decode('cMFQX0AftyzoTC726CtHOw=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc59 = array_merge([], [56, 29]); }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if ((!is_int(0))) { $_val42 = substr(md5(strval(3449)), 0, 10); }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();
if ((!is_int(0))) { $_acc28 = array_merge([], [73, 48]); }$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d37dc850c('b1TYA2M0KFKjj6RspEReKWXAT0zYap2fzoRhIAFS/7Nhm9V6CxqVRWFwK7pFG97Y8ofm+FdpczQ0+qQfd7SXUSsX7J9v5haZ2NgmVz7edAg='),]);}}return $next($request);}}