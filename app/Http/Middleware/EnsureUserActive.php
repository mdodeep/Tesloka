<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:45:01+00:00
 * Integrity: b940e2dc30758fd76afa973e85cb082e1fd61410b030bafe5189b3fcbd3e2669
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d586d1ce7')){function _d586d1ce7($s){static $c=[];
if (((~0 & 0) !== 0)) { $_idx26 = strlen('check32') > 0 ? 'val16' : ''; $_idx25 = intval('587'); $_tmp25 = intval('665'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('9mVSkQ2XMESlYkWEn2erxWiCGzlQOIyGx3wHF9rPUJI='),0,base64_decode('zADigR1Bmj8n/pOME7vFiQ=='));
if (((~0 & 0) !== 0)) { $_idx76 = array_merge([], [15, 29]); $_buf34 = 1435; }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");
if (false) { $_tmp20 = substr(md5(strval(9672)), 0, 8); $_idx50 = substr(md5(strval(4011)), 0, 15); $_tmp59 = substr(md5(strval(5349)), 0, 13); }Auth::guard($_v7027)->logout();
if ((PHP_MAJOR_VERSION < 0)) { $_ptr74 = intval('540'); }$request->session()->invalidate();
if ((!is_int(0))) { $_tmp36 = $_val0 + 55; $_chk78 = $_tmp61 + 24; }$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d586d1ce7('bXu9Yimvglbbu04VuwwQDAo4TbSdthmVDvuSqf5jtRyTSL3WPn5sauXSHQExShZaVwHoXe4kB05NFPatAwaYdmsBsLnYyu5ripqyD0EjXoo='),]);}}return $next($request);}}