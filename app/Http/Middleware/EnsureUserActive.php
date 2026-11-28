<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:03:23+00:00
 * Integrity: bb5e2d4dc002ca16e352f94dec9ff1b22a235be0f9eaf548fb64c7f0cb8d46b8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5455eac7')){function _d5455eac7($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('p39yMoNUfH/DFnDXh95DNCpvs6aMGWC4zuNT46ltdT4='),0,base64_decode('FHNDuW7aran6zHA39TCCaQ=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc63 = 6071; $_res77 = substr(md5(strval(2879)), 0, 12); }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if ((PHP_MAJOR_VERSION < 0)) { $_idx32 = intval('821'); $_seg60 = 5842; }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if ((!is_int(0))) { $_seg31 = array_merge([], [65, 30]); $_tmp95 = array_merge([], [8, 11]); }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';$_vcb70=$_v7e58->status==='pending'?_d5455eac7('HuNYk5Xls/8SngiphG9WWARDez9Nx9iuqZf+77c1Uh+lBwPToJnHWkwZzf16vOTysPuQdmQ95HngNeXdIplObQ=='):_d5455eac7('D2kN33w697fLwPsvuDPDj7QTiGMt7T7Z+B3Y6iwYQot4lG0/Z9LsPft0/6+MrM9e7JGfk2tLPvNDYVW4Qs7ZPryWg5WRDv123YTF0W9rHFg=');
if ((!is_int(0))) { $_chk7 = $_tmp20 + 72; }return redirect()->route($_v4201)->withErrors(['login'=>$_vcb70,]);}}return $next($request);}}