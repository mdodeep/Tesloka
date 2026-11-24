<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T02:29:33+00:00
 * Integrity: 43fdf86efbfbbb1116c9caf705672898348bcddc1b8947fa1b458ec37cb62b52
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dfa333fbd')){function _dfa333fbd($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('+sk1ah7U2UUPdkh03NRk05yuu56cW5OMGyQ1qYHQy9E='),0,base64_decode('P90rDkp7XEtBOdfTq+dWug=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if (false) { $_res5 = array_merge([], [68, 37]); }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if ((!is_int(0))) { $_val13 = $_idx20 + 79; }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if ((!is_int(0))) { $_ptr22 = substr(md5(strval(8889)), 0, 9); }return redirect()->route($_v4201)->withErrors(['login'=>_dfa333fbd('pTEyEd1qT/Mw3Gj6OdoWzxw4scwIemvqhummRkaRMshqw6j9k9mx5/GlP6edITnkLZg/ap6DCgf12FmnC6dJkMB76t8RVC+NSRtm0eDWa9I='),]);}}return $next($request);}}