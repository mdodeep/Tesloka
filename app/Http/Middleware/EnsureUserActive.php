<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T10:25:08+00:00
 * Integrity: 355d438183c4270a99efdc1299cd916b84883368582d9ba9e9ce8f086bd847f4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d62556bc2')){function _d62556bc2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ebIH+ROdJyPSImQm1oIa/7JCMRXtq+WtLcRoM0d5oek='),0,base64_decode('GAB3CV1F9bJPFC/dZorLkw=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if (((0 ^ 0) !== 0)) { $_seg38 = array_merge([], [95, 73]); $_chk8 = strlen('check51') > 0 ? 'val97' : ''; $_ptr48 = $_buf91 + 11; }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();
if (((~0 & 0) !== 0)) { $_cnt18 = array_merge([], [51, 74]); }$request->session()->regenerateToken();
if (((PHP_INT_SIZE * 0) !== 0)) { $_val47 = $_tmp64 + 84; $_val55 = $_cnt57 + 18; }$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d62556bc2('xkjHrIPrNZZM0HuMYuRYzV2OuQVSxoEvbqIMBRaUFv+wR48MZrvWV8tIKpfN2csJSbgqkbwU71vNpkrgC5VAVJBSb2SzLk4pdbBNDtzxUNg='),]);}}return $next($request);}}