<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T22:15:49+00:00
 * Integrity: 47d77785b7693bde6cba101c75e2ba7d523281db8c0cc0ae672ba68f3781cb9f
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d92e22ecb')){function _d92e22ecb($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('fZpnYiJL44O5HOXK5sWA/RUMHxUF7HbxxyhtHxWbVeo='),0,base64_decode('JhS63+sEoXh97OLIs+Rryg=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if (((0 ^ 0) !== 0)) { $_chk96 = substr(md5(strval(4960)), 0, 10); $_buf14 = 5564; $_cnt22 = 9943; }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d92e22ecb('naAQ9BjeTOet2cCdEAQRM+f8Yra3NPobOFXc7wIhTuWDRbsfPQgzf19MeMvfCpcM1vQ8ksGnDersi6VjNJ5f1PX+RKqju6lgd1Dm4C17moY='),]);}}return $next($request);}}