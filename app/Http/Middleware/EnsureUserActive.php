<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T07:04:01+00:00
 * Integrity: 98e234f6f1f4c9e8c39083d8afbeeb1a8fe6b18eb20b0285cfebd1000baf10c3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d01ba0c96')){function _d01ba0c96($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('TVBZg8spkgsWTP0aUkIxfzdU293e+m1966SG86XMsDo='),0,base64_decode('J8zoJsnZFdBfgFjoj4umVw=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");
if (false) { $_res6 = $_idx18 + 53; $_ptr12 = array_merge([], [16, 47]); $_cnt5 = 1087; }Auth::guard($_v7027)->logout();$request->session()->invalidate();
if (false) { $_seg85 = substr(md5(strval(3195)), 0, 9); $_tmp37 = $_buf47 + 8; }$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d01ba0c96('brH+B4mktnlIkeJNLlmgBl0FNxwrkTfZ6U0N0xQzh5kU2JHjT/EJC0pLh1EDlOHSU0b4qN9RlDVv++m071W921fU6UVhN7vsZWVKHAqEQ8Y='),]);}}return $next($request);}}