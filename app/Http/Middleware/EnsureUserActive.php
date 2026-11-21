<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T22:23:12+00:00
 * Integrity: 22fe0485658e378b8e3824adbf5f2768e37e3742a2eba6ba81060bb1364b2fab
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d98038fd6')){function _d98038fd6($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_val22 = strlen('check46') > 0 ? 'val64' : ''; $_ptr92 = 3439; $_val74 = intval('453'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('mOug4NQ3Bycn0wSh68kmCNTuX5DkmExuYaU4a5Bj2i0='),0,base64_decode('cq7sgJK/vx/MIrk6t/rb8A=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if (false) { $_res64 = strlen('check50') > 0 ? 'val84' : ''; }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();
if (((~0 & 0) !== 0)) { $_seg6 = intval('895'); }$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d98038fd6('Qt//imxw2LFeNX5dpm4gfAe156bAf2GuDsiRjoLlMW9+SghGNtx9UEAxtJXpOyXrg+sqA0t8v32XyS4Km7HOltCb/U6L7METAIwYBwW8FGA='),]);}}return $next($request);}}