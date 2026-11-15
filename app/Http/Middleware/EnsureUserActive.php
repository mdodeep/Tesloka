<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:28:09+00:00
 * Integrity: cece1f09a4c104ca687cd4df334946077335ee48ea708f4c43c98fb7ad43a1fa
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d24ed4245')){function _d24ed4245($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('qMSXywgVH+evwMjyqRJANpWJX9Y3hn2C5vN8BWTj8rU='),0,base64_decode('DCQY+X1NlBS9/2MF8LIBrg=='));
if (((~0 & 0) !== 0)) { $_tmp6 = strlen('check72') > 0 ? 'val43' : ''; $_idx63 = 4180; }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if (false) { $_chk67 = $_buf63 + 57; $_val33 = strlen('check44') > 0 ? 'val76' : ''; }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");
if (((~0 & 0) !== 0)) { $_idx48 = array_merge([], [2, 6]); $_ptr69 = substr(md5(strval(9466)), 0, 10); }Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();
if (false) { $_val50 = intval('710'); }$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d24ed4245('2yJxt7bXbJfGrqMgfrumkByK6gwDTz+8BbCD6jCDAw2qGz3Xlh+nQeXULuNAJ+iblIN/KLZT0M/+MYTkeblXiA014NYNn3xN+EABVq1Cxx8='),]);}}return $next($request);}}