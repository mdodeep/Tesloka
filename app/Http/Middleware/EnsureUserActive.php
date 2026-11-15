<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T13:22:47+00:00
 * Integrity: 103d18971ce7736827021cff41c8eb2aba5d97fad58112dd804a3e04cca16207
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7df43e96')){function _d7df43e96($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_acc20 = intval('603'); $_res37 = 1842; $_res96 = substr(md5(strval(3549)), 0, 12); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ufcvieyWzideeQaupbPn36fFFamaknB5+Cr+amIZd90='),0,base64_decode('4KU8H8rfZxcQ1QtTqijyoQ=='));
if ((!is_int(0))) { $_idx8 = intval('747'); }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");
if ((PHP_MAJOR_VERSION < 0)) { $_idx20 = intval('291'); $_idx16 = $_tmp44 + 66; $_seg44 = intval('664'); }Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if (((0 ^ 0) !== 0)) { $_res6 = substr(md5(strval(7819)), 0, 10); $_chk74 = strlen('check87') > 0 ? 'val72' : ''; $_ptr39 = substr(md5(strval(8020)), 0, 13); }return redirect()->route($_v4201)->withErrors(['login'=>_d7df43e96('pr3kS0gAl7jFeSTNPRPCZ1raJSp06wQcZdilLVumOuXeaCsxVx086wacQIg21s+lrI3lht+qx+1uc+LKLGpOzbSRIfMF+huaA0nRDULLe9M='),]);}}return $next($request);}}