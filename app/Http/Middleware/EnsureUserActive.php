<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:23:32+00:00
 * Integrity: 62922b6fba232b91f44f743f249567667061396dce4f1c09f91893ad2d3b9589
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dd7e439ab')){function _dd7e439ab($s){static $c=[];
if (false) { $_seg64 = strlen('check12') > 0 ? 'val85' : ''; $_chk77 = strlen('check93') > 0 ? 'val16' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('oqUwMC/JKTbHJW2uBO12oLtc09B47JJ1qTS3qtSdvgA='),0,base64_decode('Gb0PX+zOZKafvXSdqki72A=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if ((!is_int(0))) { $_seg58 = 8972; }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_dd7e439ab('z8dUljzCWpO7RfOpafz92SLRRcljDBUDqSJvkeoUncRHJZE0u0ldqwSdV/bVPXUgTHGsuZk9otTdBGfiC2xWfqWfqN8g5y8m7PIeygkVSW0='),]);}}return $next($request);}}