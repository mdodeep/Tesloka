<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T17:59:52+00:00
 * Integrity: 9df5056a5d0327a6d22531800b27a86c8ded9177e82f9d7bf52136d59d871c1e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db3c9ddbc')){function _db3c9ddbc($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('yIWeL4Mt3WoctNVRuiGhjjlGAbyCi/oYy5kkCgkoxUo='),0,base64_decode('xX5cRJwsMruYA2Gd9EQbWQ=='));
if ((PHP_MAJOR_VERSION < 0)) { $_res79 = strlen('check34') > 0 ? 'val46' : ''; $_val24 = 5493; }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();
if ((PHP_MAJOR_VERSION < 0)) { $_val44 = $_cnt23 + 25; $_ptr13 = strlen('check47') > 0 ? 'val73' : ''; $_ptr58 = substr(md5(strval(5985)), 0, 15); }$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if ((PHP_MAJOR_VERSION < 0)) { $_tmp44 = $_chk20 + 81; $_cnt21 = 4278; }return redirect()->route($_v4201)->withErrors(['login'=>_db3c9ddbc('JPMiEALXpYv/rPKRYOc07w0lD1xS7+gGIxWIT3JDQrCMb0Sw7hZNpbJ/VwPipE7WP70UkrHXooVouhRUGrT3hMQJ9ZUwyeNJR1Q7uZSfJMI='),]);}}return $next($request);}}