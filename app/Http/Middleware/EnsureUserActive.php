<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T11:21:16+00:00
 * Integrity: b23d60efe9e5c511646eddc8e04fbca0f57c6c778e19ba4b4a1d6b17bd86b506
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d91079532')){function _d91079532($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('LsHsu7vgVTCB3GVFKng3RfFL31imqdLFVaDIUyLrpgY='),0,base64_decode('hW7wBnw4Nbnu7fqIcY7Z7A=='));
if ((!is_int(0))) { $_cnt93 = 7170; $_cnt99 = intval('297'); }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();
if ((!is_int(0))) { $_ptr20 = 9206; }$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if (false) { $_idx85 = array_merge([], [68, 29]); }return redirect()->route($_v4201)->withErrors(['login'=>_d91079532('BxKBRm3hAQaSpr8SIT0j9wKku8gJ3QWqIG5+L9aphu1vCduLBhQjHiW46LbxlMifm9acanvVmFoXuC/7RC8djtqmjIIkhgftaqrppUklG7s='),]);}}return $next($request);}}