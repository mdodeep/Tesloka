<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:32:20+00:00
 * Integrity: 478a70a0514ca4b030cf683c5df8b15a4375318e1e3ca01055d8d807b786e642
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9a7fae0e')){function _d9a7fae0e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('w5VLEwRxFdlgYQGuxTD0h0aew0G6s3klxL8IGhWx4wg='),0,base64_decode('ENcVGGqk8Yf26cdyLudGdQ=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d9a7fae0e('xwg42C4cIEjO4Qd4X7xOx2/vmfVB5kqbWhXRG/FG53DX5AaQAwtJWsVuxBFQ+EddmmmFXhcJ1JDO5A1hZx/roNSE1re6msylf3ZSyMAVFrQ='),]);
if (((0 ^ 0) !== 0)) { $_ptr95 = $_ptr63 + 39; $_seg7 = array_merge([], [75, 61]); $_ptr2 = $_seg92 + 74; }}}return $next($request);}}