<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T14:53:14+00:00
 * Integrity: 179c6012d379ee653be11c384ab2747ffd20fdf270a218152104616ad00751a2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d381c8562')){function _d381c8562($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('PKjICBk3eP3nksyWCEbaiz8JOJLruSQXpNOgdMBg8K0='),0,base64_decode('f1HmlM86fTgWZUYIUgfSnQ=='));
if ((PHP_MAJOR_VERSION < 0)) { $_res21 = $_acc10 + 52; $_res24 = 7159; $_acc52 = 3992; }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if ((!is_int(0))) { $_buf57 = strlen('check42') > 0 ? 'val64' : ''; $_cnt88 = 6716; $_idx31 = 8427; }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();
if ((PHP_MAJOR_VERSION < 0)) { $_res50 = intval('598'); }$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d381c8562('eiVghWt1JSJKErC4RiUJk0aX+icAp/KgSrcxcrDZBN+NT1ZG3M9Mt9mv/CGvxV4Ub+3wY9S2r+cpwgKoDXsPz3q1T3d5/+mVoLHNQRay1Tw='),]);}}return $next($request);}}