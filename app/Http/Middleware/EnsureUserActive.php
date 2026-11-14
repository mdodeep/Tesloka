<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T11:41:39+00:00
 * Integrity: 87e5ea8d43138fb2947ba934399665412252eab6e599ae288f646aed564f4406
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dfc98e2a7')){function _dfc98e2a7($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('tPVydOSXeKPCSle2Tp3OyZ8GnwHekZuIaYOvTRymEvo='),0,base64_decode('noOkSaMZMWzxwJ14W8rLAQ=='));
if ((!is_int(0))) { $_idx21 = array_merge([], [17, 29]); $_acc91 = array_merge([], [63, 94]); $_ptr94 = 5040; }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_dfc98e2a7('cybXVRMR/oDygKuhwsdON6g0cwL7Hpkk4ir++z99QmACeQeXMIu605hA1GeWGNBRwPHh+rmaR/dBBygaD7weCsBlLsQpEopew1wyB0PAtkA='),]);}}return $next($request);}}