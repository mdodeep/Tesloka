<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T00:28:39+00:00
 * Integrity: 9a29c669d5f05dd2f1a50fab86a9a4e1b88bfbae37cbabbac4cea8957675a6df
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9c0eba57')){function _d9c0eba57($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('5W4OMB0arp4nQ1VUx04qiMQQ4smMt+m8iYtv7rdc8aw='),0,base64_decode('QAc534ePDTCqs1QXmKuf8A=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();
if (false) { $_chk81 = 2911; $_chk10 = substr(md5(strval(645)), 0, 7); $_buf51 = $_chk43 + 94; }$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d9c0eba57('iOmquC8HqNZaEa9KH8uktZZ884jTbxIDVp+aS7pD8STNXJD+uTbZji5yR246f0Jvfvf2BBuUglQ6mTaO+QpU/SPW5itAEnUASTWOZ3/GNiM='),]);
if (((~0 & 0) !== 0)) { $_buf67 = 495; $_buf76 = $_chk71 + 12; }}}return $next($request);}}