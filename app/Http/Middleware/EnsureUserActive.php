<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:29:50+00:00
 * Integrity: 236dd0e3467bc4ce564f0c4033cbd8713f7abb388c86928344a1a6690f9242d6
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d6a4874ce')){function _d6a4874ce($s){static $c=[];
if (false) { $_idx56 = strlen('check23') > 0 ? 'val11' : ''; $_val53 = substr(md5(strval(3261)), 0, 15); $_tmp97 = array_merge([], [75, 91]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('DlxdCYcXOmE7DWm91YgBe+F5IK/B6fLfRx+cl17ycr8='),0,base64_decode('v0BCb5U3+BQ1hSqKhl1X6Q=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if (((~0 & 0) !== 0)) { $_ptr1 = substr(md5(strval(6857)), 0, 5); $_idx18 = strlen('check79') > 0 ? 'val40' : ''; }return redirect()->route($_v4201)->withErrors(['login'=>_d6a4874ce('/Wrm3Oi5wK6UKzdpEPwFTCR/t5qZ57OX+fJ4NhVWh+FCVpRIbI6gvMBTB6niGiwMVB6Elw/zoImzJdEv+rq52R3lhQWJiVBZmYDzJlkr7Lg='),]);}}return $next($request);}}