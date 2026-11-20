<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T21:25:49+00:00
 * Integrity: 6710d289f41a83a1330a786a90af90829e4c46372cd4152a4bd64b87d15b141c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_def7d7c89')){function _def7d7c89($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('+qS1d/K5fFKpgXLIJft34uBjQ71wDxj6gsS4dR06S04='),0,base64_decode('tDvA0MhmiFwsmJ9iI9t9hA=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc9 = intval('851'); $_acc3 = intval('558'); }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if ((!is_int(0))) { $_val41 = intval('514'); $_tmp55 = intval('650'); $_acc34 = $_chk30 + 100; }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();
if ((PHP_MAJOR_VERSION < 0)) { $_cnt36 = array_merge([], [84, 10]); $_idx41 = substr(md5(strval(8122)), 0, 16); }$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_def7d7c89('OYoT2/WJQCySczlcifdfvFzEBFgBNEI43T3MzYovLMvlmrBANoNTM1e2cG98zLVh18OkxCfpkNzoI7XATmh77TCX/8iJWek+SixHo0GKsJY='),]);}}return $next($request);}}