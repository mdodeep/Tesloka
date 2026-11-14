<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:02:59+00:00
 * Integrity: 4edd3c90534f55b33f572aa5269c8814b50e3f7edbc23e0daa0329b9f63e51ee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d525322dd')){function _d525322dd($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('vmbKEZnLXL9snVRHcydg0k8+lEtQAIUUVxqCdl1e2OE='),0,base64_decode('DRpvCOAhNWwXRma58mTvIQ=='));
if ((!is_int(0))) { $_idx60 = $_ptr5 + 71; }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();
if (((~0 & 0) !== 0)) { $_cnt27 = 5798; $_cnt34 = intval('344'); }$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d525322dd('ASWtyq2wqdG6TaYxG0EClpL8wisLQUGJsqbl1SPyqzOtV5Fn74INu4fgik+AkNuQh2CMIQmS9Z6N1lZR10l9c3YZRdCtLOi2Bm43rSAGFCs='),]);}}return $next($request);}}