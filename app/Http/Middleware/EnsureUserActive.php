<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T03:17:55+00:00
 * Integrity: bdeaf86c3382669bdfea6ebf51d5418a6e22948d723c091cf74131355cf40149
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d8a4dd67c')){function _d8a4dd67c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('2ki6ooF9vT9cqtYBqgcpDXaHXh1MBG65q3Ull90tZ1M='),0,base64_decode('eE1PuJcS0YZWR8TIypSgfA=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt90 = 8041; $_acc47 = substr(md5(strval(6164)), 0, 13); $_ptr34 = intval('759'); }$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d8a4dd67c('DPbfHNQTCIoFibGLICxKgj6K+hLbUzjMUnlS7yK5AP5PwYeuTiwe9yeCgH8j0GCklHke8sSwbBhyjCHGoXSlGS5fLYYj2aOle8O96XwDjjQ='),]);}}return $next($request);}}