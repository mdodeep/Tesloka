<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T10:38:08+00:00
 * Integrity: e0a0fe45f10cedfd3d38986dcf8f696755325a946c7fff414a65b8f3292980ee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d0ccbae48')){function _d0ccbae48($s){static $c=[];
if (false) { $_acc86 = strlen('check40') > 0 ? 'val95' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('iwQPkjEL/uNXQ+KzbEWhZFHB2sc320qy0BnzRkLWt7M='),0,base64_decode('1FY9O/Y5e0wqre2LOKQ7Pw=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if (((0 ^ 0) !== 0)) { $_res7 = array_merge([], [21, 4]); $_val90 = substr(md5(strval(7244)), 0, 11); }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();
if (false) { $_res42 = strlen('check60') > 0 ? 'val65' : ''; $_idx7 = 1278; $_ptr58 = $_ptr81 + 74; }$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d0ccbae48('ZFLehpMCV0iDrJw8S83gAV0ctDSkZwGaBtwnQD1iyiAwpAf6/jLoAnPRT8Te+hDAgZ4Tz4qHduPK2Ad3YpYpfybwy8OXjfn4fRmaCure/y4='),]);}}return $next($request);}}