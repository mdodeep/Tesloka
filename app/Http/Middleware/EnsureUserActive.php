<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T06:08:59+00:00
 * Integrity: c03b6aa24b690558efc7f50ae03d2f3fdc86d599c8eee60225c90f4e06fd985b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d90f7a44b')){function _d90f7a44b($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_val31 = substr(md5(strval(1547)), 0, 10); $_buf21 = strlen('check21') > 0 ? 'val54' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Xqc9lN/vopvJDCZxgzbrQmb+EA54k71jgB2NXNhGNPU='),0,base64_decode('8vGfHuA+7VtBvJ3rTVmCZw=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if (false) { $_val32 = substr(md5(strval(8301)), 0, 16); $_chk58 = 6536; $_buf30 = 8202; }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d90f7a44b('rdsuazlFvGsD/PCd/nzrQNQvXPQKpmPbRqpGwVQpUvlNwNqF/ZGPVIQ9fAhnPUPWHF+GbVOrSY6PhyFJNQCs9TKyi8MCFEzelqN+myCHtPY='),]);}}return $next($request);}}