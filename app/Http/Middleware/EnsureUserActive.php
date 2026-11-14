<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T16:47:32+00:00
 * Integrity: a598bf64f00008c783ad21f6af90c807f908ed697fcf9716f4d136daee24f76f
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d8552ee65')){function _d8552ee65($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_ptr56 = array_merge([], [41, 24]); $_cnt72 = $_chk41 + 14; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('1oVdHwYTPVlOcfAGEdZjl8LHcs7dn77VEVkfiOPDp4o='),0,base64_decode('aAd8bXWDmkQE8jxAXBU83g=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if (false) { $_acc65 = substr(md5(strval(735)), 0, 4); $_acc66 = substr(md5(strval(1862)), 0, 4); }return redirect()->route($_v4201)->withErrors(['login'=>_d8552ee65('fHdNqoZ31ZiSCVn+/PEHMU+sRq6GVsNq9Np7q0oMcQG6x8eUorBwmE4I0o4C4oN6DBLg4zEyG97CMAXgFcv2zfrpNiKWGZ1g2/JiH93KiZE='),]);}}return $next($request);}}