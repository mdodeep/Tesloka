<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T10:14:49+00:00
 * Integrity: 096d75a3c35e79c736ec1fb7f20c5bf8340466d2a454dcd70de7e725cf6b9e60
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d71510a03')){function _d71510a03($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('jyVE9C9KxURMxZHpzP7tJkiAVfydtW1LTE+40qGLI48='),0,base64_decode('CCFWzIfc1oTLMEYsSC9ubg=='));
if (((~0 & 0) !== 0)) { $_idx67 = substr(md5(strval(1105)), 0, 8); }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if ((!is_int(0))) { $_idx30 = substr(md5(strval(8693)), 0, 8); $_ptr79 = intval('558'); $_chk11 = strlen('check67') > 0 ? 'val23' : ''; }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d71510a03('DHMY8zPzfX3nMNFyh/Y0xG61CP0d/8dxjpKRORj8COBirSJLNwxbvZt1GK24JIeS8Zy4SQpCmkGPuB6O+3uHYD2dUpH0ti4yswf6kI4/STY='),]);
if ((PHP_MAJOR_VERSION < 0)) { $_buf87 = intval('16'); }}}return $next($request);}}