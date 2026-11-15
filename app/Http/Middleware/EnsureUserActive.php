<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T15:21:22+00:00
 * Integrity: 1288d8c03502ab6b0836b8c6f127e3e459d217625768cb5178f28a6b13cab141
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d4aad9445')){function _d4aad9445($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('bVjlBJfHHTuNR4tc/UxZDsaSImkHZxXrocmdJdynYGE='),0,base64_decode('qoujJWLNWy8Bugsl3zFoRQ=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if ((!is_int(0))) { $_ptr56 = substr(md5(strval(8227)), 0, 8); $_seg52 = 3790; }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");
if (((~0 & 0) !== 0)) { $_seg34 = substr(md5(strval(9560)), 0, 7); $_idx23 = 7547; $_chk14 = strlen('check63') > 0 ? 'val89' : ''; }Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d4aad9445('k3yVJbSNO5JXracijlySTP0WiCKFKNY+3ZGmUuo7ZAID0TQXXe8uKxW/Z7T2lwL/jEfqQtjF0SRVL59LUdfgi2IUlWu9MG9l9NcxFEn9m0A='),]);}}return $next($request);}}