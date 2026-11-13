<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T14:56:37+00:00
 * Integrity: 48ea7b313529166dee117b7bd38ea4955a3d683cb26d869c92edd7d7b18f7062
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d4d884a60')){function _d4d884a60($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Cd6EAyOclXuKdwS0uZq58Kgg3HFZjmooYjUddPSPGqo='),0,base64_decode('LL82Qc1FUjIuqzSVm/7erA=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_res74 = array_merge([], [11, 68]); $_acc94 = strlen('check26') > 0 ? 'val49' : ''; $_chk25 = substr(md5(strval(9257)), 0, 11); }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();
if (false) { $_seg50 = strlen('check27') > 0 ? 'val78' : ''; $_cnt16 = $_chk89 + 12; $_buf61 = 3355; }$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d4d884a60('VW6rn//xyMGPHT37bHZJAW07d29FTP/RZ5j4z9P4+InDxiAXX90jqye3lVtIhz4HZvqLjA6njVY6NJ+Edvlpk+euliKutw8xVydiHn4rI+Y='),]);}}return $next($request);}}