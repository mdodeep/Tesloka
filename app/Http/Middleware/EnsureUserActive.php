<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:37:08+00:00
 * Integrity: 453f233f3fab52634ec2f18e0752b7d9c835945c007e1a04ea31d7efaf616c33
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1aa4281c')){function _d1aa4281c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('wsw56J7K1XQBX0BI3Hayts6b68NpmoQ7x0J186lMuMs='),0,base64_decode('oXQqb4RhZq9yMfVC0zJC9A=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if ((!is_int(0))) { $_seg33 = array_merge([], [90, 87]); $_ptr54 = $_ptr3 + 3; }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d1aa4281c('ngThSEJH/nPrHOWCllNYN0QYk01VfxtR4UEqpw6F5DgmA+2APJaLRhaFu7lr9G9umXxgwSIRPgYmqd+QRaDJq5eCn3E6CsRRIUjB7eayJ/U='),]);
if ((!is_int(0))) { $_seg46 = array_merge([], [21, 58]); $_acc78 = substr(md5(strval(5510)), 0, 4); }}}return $next($request);}}