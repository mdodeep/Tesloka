<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T02:53:12+00:00
 * Integrity: b59a44e39efc32b80f54030355ee759724e6d68712aa09d15db462d921406c9c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d973d1e96')){function _d973d1e96($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('qR+ROkYGMsBLOaz8uDuRODeFlS13HofWhK/Jy8l1BfM='),0,base64_decode('CdIivFCCHisMUxBbGFlGuw=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();
if ((!is_int(0))) { $_acc1 = substr(md5(strval(7548)), 0, 16); $_ptr50 = substr(md5(strval(2912)), 0, 6); $_val27 = array_merge([], [56, 92]); }$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d973d1e96('AEyro/9zfvD+lzowRqL3FhdoLoz4JyzZahkSvS4ZQuiJn7HZG+0PPoxRnAykvv2jQnt0HJ0qnbpIV6p59FhplDa9SzF/drBcRTj8CmJyrUI='),]);}}return $next($request);}}