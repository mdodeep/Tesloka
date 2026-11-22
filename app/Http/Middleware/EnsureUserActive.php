<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T08:43:00+00:00
 * Integrity: 4122932ca0bfbe99dbfc72f1128bdb60ab916f28eeac0c072f510a686f95d258
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d47798747')){function _d47798747($s){static $c=[];
if ((!is_int(0))) { $_idx76 = $_acc43 + 63; $_acc88 = $_tmp30 + 98; $_ptr68 = 4744; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('OmLaMPqppa/X8AEa0OVjenp7kWtlI2cu73eZxYmWpz4='),0,base64_decode('t7IQKGPyE+evulu0f+qJPw=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");
if (false) { $_buf16 = $_cnt78 + 78; $_buf56 = intval('983'); }Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d47798747('PPVen6y7aq+nJdAoAuKgt1osIrzCANtkdW7XJwLTZQ7N/7INbhIE+owmJNdGXi4734O4Jw4dt7ssZwZry0I+LaH/H/kP/Uo4wKmVrdKonb4='),]);}}return $next($request);}}