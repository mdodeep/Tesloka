<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:33:03+00:00
 * Integrity: 5825c4b58f1782521538e33f3b1d0d4d3ae088ba26ed6da8509eef8d6ee93945
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d919463d9')){function _d919463d9($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('yV3nIXbHgKAAl7wsi27/UPAEDqBauhwAe0Q75z3wyyw='),0,base64_decode('01XezhpnozOReb9xVWrcHQ=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if (((0 ^ 0) !== 0)) { $_val66 = $_acc53 + 92; $_acc39 = $_cnt35 + 80; }return redirect()->route($_v4201)->withErrors(['login'=>_d919463d9('52oqMdnDp+JxapQGaCxcvTWTDGRzOmz3Zh3aZXNgN02NTupyr7acj1z5FQBVGRusOi2FH47bxntgZIQTJxWsBIcvu6z9fJ3m5uzU23MUaWc='),]);}}return $next($request);}}