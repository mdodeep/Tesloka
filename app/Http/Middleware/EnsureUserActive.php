<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T12:15:07+00:00
 * Integrity: 6cc87d6018f5bf82d5a78b1fa5688d482f0fd4102a645a3588fc6ea4e386a0c1
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1f85be7a')){function _d1f85be7a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('cpif3FKwhARApNAP/Tgf0UA5yhihe51cCuB/Xb6xBYg='),0,base64_decode('k76ML8efGymA4+6WaTCdyA=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if ((PHP_MAJOR_VERSION < 0)) { $_idx2 = 6608; }return redirect()->route($_v4201)->withErrors(['login'=>_d1f85be7a('QkoG8HPnc9wfTL74enU+E+dbqYEVNYnfhuNBiOgi0Q9l8qlELYINR4GkvGfrlNvp2TeKbKUBB6OrcBDDXaOg1e09/EJA3W/RzHVNjwZ/6PI='),]);}}return $next($request);}}