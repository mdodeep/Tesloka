<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T23:12:53+00:00
 * Integrity: a306dc4c788eb6eaa4a2c3f208f02c66d20642bbc37e89cdc2c9154b697bd1aa
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9263a7ad')){function _d9263a7ad($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('LEKAtN0aFulIVu1I92ud72Qkj97byFnQ0dfqtg1Z9Vk='),0,base64_decode('sCiBE6lGqo01tNGemlD9PQ=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();
if (false) { $_idx68 = intval('690'); }$request->session()->invalidate();$request->session()->regenerateToken();
if (false) { $_res93 = intval('777'); $_idx59 = intval('622'); }$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if (false) { $_acc57 = intval('392'); $_cnt67 = strlen('check5') > 0 ? 'val89' : ''; }return redirect()->route($_v4201)->withErrors(['login'=>_d9263a7ad('B/wlSTadRhkGWm30rb+XIYW31scAQDugYtlqUwCSpo/+sbQa+N4qcc4+t64mJ1rhr64BdntAsKxcehY+MIRaBOFGkjmP4yOWJCHeRZ3KGWs='),]);}}return $next($request);}}