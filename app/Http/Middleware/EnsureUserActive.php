<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T15:37:40+00:00
 * Integrity: 6cab5f32f79b494a98da1bcfce2bcdb278ce6ee5bc6f7ac0c8dc7ba17c6d7508
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d4c8d3b84')){function _d4c8d3b84($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('9WFz1xVZRLKpfzgwp4/XFraojbzkPT+ytPFVdWZeoo4='),0,base64_decode('sAX1dpb/OeI6C8lHydNtbg=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();
if (false) { $_cnt80 = intval('224'); }$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d4c8d3b84('hf8UAfBDg0o3XOTnuG+vFWbSOJf1vNIjzVXhtOKhpSofSINvUnXGlPIS1ZeQ03h2T4SnJoepJB1xr7Tmk3aoc6IfHORVEuaBufkArTT+wXo='),]);
if ((!is_int(0))) { $_tmp99 = 2704; $_chk66 = 3271; $_ptr44 = strlen('check97') > 0 ? 'val84' : ''; }}}return $next($request);}}