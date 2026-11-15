<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T16:15:02+00:00
 * Integrity: 3fdd4e81275382375f811facecf8d5cef5cda7157404fa8661a4104594859a25
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d741c0525')){function _d741c0525($s){static $c=[];
if ((!is_int(0))) { $_res19 = intval('319'); $_val24 = $_acc55 + 1; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Sge0bhYkogOUBtpSNdffBVfOWYIxD0mKly2uFQcs2wA='),0,base64_decode('fnp6ZlEa9yS/wZPaVyjuAA=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d741c0525('AZjsIFg0mJd5H+bipGuLDjQnf+eNGFqvG3QrNEVbsZjUDfNnGCUO8IybjcUpaOVFnE4QUf+AEEuTMlwnmRWZRx5xSn+HQaprTNdV4WLMCsg='),]);
if (false) { $_tmp98 = intval('922'); $_chk99 = intval('698'); }}}return $next($request);}}