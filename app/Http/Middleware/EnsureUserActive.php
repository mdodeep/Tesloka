<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T00:08:20+00:00
 * Integrity: 7e97075b0c1d11d33345a82032b32d9a6731eec33cb5702f74d22d41762357b3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d188e0270')){function _d188e0270($s){static $c=[];
if (false) { $_seg40 = intval('765'); $_cnt44 = substr(md5(strval(2403)), 0, 11); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('xnYr5/WLOkvdukyZqA1+v3GAJakbQemJxDsORMdv0NA='),0,base64_decode('mF55Pn57m2XhSh/mA6O9Ug=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d188e0270('Ue2v22k6t44VNX1Ui7hfyucGnBlR6RAkV0JYXsUMf3Gkz3diGnjfwc5Z18ZH1Skx2fl/wgINsjMhw1p7zkQutSf0norne7ZGP81KoB3OHuc='),]);}}return $next($request);}}