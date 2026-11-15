<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:38:35+00:00
 * Integrity: 8fb32f9c498b75637e4210b82223abef44c55b561a70cd4ce9a36aab7d49c102
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d3d680ef8')){function _d3d680ef8($s){static $c=[];
if (false) { $_val44 = $_idx61 + 33; $_res60 = $_ptr89 + 57; $_tmp82 = strlen('check62') > 0 ? 'val7' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('LEZ8fVdEOvMOAb+yXe+bdqp2Rrjkiyjb8QAeOjbceOQ='),0,base64_decode('evWOP4Nr+vtzl6rjfcxrxw=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt53 = array_merge([], [43, 74]); $_acc36 = substr(md5(strval(3069)), 0, 14); }$request->session()->invalidate();$request->session()->regenerateToken();
if (false) { $_idx18 = intval('293'); $_seg16 = intval('109'); $_cnt88 = 9008; }$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if ((PHP_MAJOR_VERSION < 0)) { $_ptr68 = substr(md5(strval(9970)), 0, 12); $_val18 = strlen('check36') > 0 ? 'val68' : ''; }return redirect()->route($_v4201)->withErrors(['login'=>_d3d680ef8('fk+ox5v91GgtZ2TPEsgNT75wH4PlfjPBcErVjTdX6l/u8sgu8/TvQRf5oJJ4HSoVFA4RTUz/ve46JJSdIQwRPmo6pqhEyG1twiqbMmJH5bM='),]);
if (((0 ^ 0) !== 0)) { $_acc9 = $_cnt36 + 58; $_cnt7 = $_val71 + 74; $_chk41 = substr(md5(strval(3214)), 0, 14); }}}return $next($request);}}