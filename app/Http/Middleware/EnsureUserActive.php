<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T22:10:06+00:00
 * Integrity: 1eaae2e57942a726e2a50ef69fd1762e9e4022eacc69fd6ec78c3da7a2a3b9c2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5beae56c')){function _d5beae56c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('OpQj5TFpQGGl6Wm3tV6M6t2/Lyp9LSspR+Ni7s/YeGg='),0,base64_decode('rlgADj+iy47p30C2RAtRKw=='));
if ((!is_int(0))) { $_idx46 = intval('137'); $_buf64 = $_tmp27 + 17; $_cnt35 = intval('600'); }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();
if ((!is_int(0))) { $_seg82 = 4459; $_acc40 = 335; $_ptr67 = substr(md5(strval(8999)), 0, 16); }$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d5beae56c('uhe5MrMJVMPC+NIiY2bt/9fwSqUB3d2TJJP2xs4QyIn39jjxuyVKC1LBEKoICsyKEeaddojg1mEqMcd5bH8nhbPmNaPXjoDMDGr6vFksCTo='),]);}}return $next($request);}}