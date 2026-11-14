<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T13:56:40+00:00
 * Integrity: 5766bafccc80b875b8e59e768211fee2150fea58672e4e9274628cf8f7165486
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d67c4af58')){function _d67c4af58($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Y0C4DH21UdmzY9a6bj+GzdseEKPwwKG8EgHj8lb+KAo='),0,base64_decode('RY4zr4DU/1nSJWQNfBWwEw=='));
if (false) { $_res13 = strlen('check53') > 0 ? 'val61' : ''; $_cnt81 = 6848; $_ptr58 = intval('880'); }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if (((~0 & 0) !== 0)) { $_val31 = 5746; $_res50 = $_val95 + 85; }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg60 = $_tmp68 + 8; $_ptr6 = strlen('check61') > 0 ? 'val84' : ''; }Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d67c4af58('oDk289w3ye4txRK1Qh/hMl1FU7Y4/19swIH7usST150Vj6kR+eqITaphcmZdqh+3MfrcPeBMrZMZZqrg+amZmS27vfl3ax/d/7x87G0WSGs='),]);}}return $next($request);}}