<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T03:05:06+00:00
 * Integrity: 16904cd816c3c21956ec405fb921e49fb870ec1c25916fdd9d72495d85d174fe
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_defec424d')){function _defec424d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('YvrY0hjbBRihWRFbX3ltwCuCLAaoykzqORrOH13Xt2o='),0,base64_decode('NJvynXH93upTzNoxBFhYMQ=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if ((PHP_MAJOR_VERSION < 0)) { $_idx15 = $_cnt12 + 14; $_acc31 = strlen('check71') > 0 ? 'val31' : ''; }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();
if (false) { $_cnt48 = strlen('check72') > 0 ? 'val24' : ''; }$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if ((!is_int(0))) { $_ptr70 = substr(md5(strval(1579)), 0, 15); $_acc89 = array_merge([], [84, 18]); $_seg25 = strlen('check65') > 0 ? 'val56' : ''; }return redirect()->route($_v4201)->withErrors(['login'=>_defec424d('ldEALzO2mmjb62nnlwAHz61d8yUJP0HuFgbHIxLNtm5LC2qY36qGVlXLmpjkh3jC0T6NNQZtpiZ7stl4goRD7xmbj8w9kn62ke4uwcwMut0='),]);
if ((PHP_MAJOR_VERSION < 0)) { $_buf0 = substr(md5(strval(97)), 0, 12); }}}return $next($request);}}