<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T16:48:11+00:00
 * Integrity: ab8dcbec4f381a73c000a540f5da45639f9c8e40ebcc1ddbc948e203c6c604db
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d104f497f')){function _d104f497f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('GrkAXZbitDVcdJpPVPR+ledbxKRilyQZVuyC+EuZEhk='),0,base64_decode('ZD8y9r1rMC+qKy6G/9kIbw=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc42 = substr(md5(strval(2132)), 0, 6); $_ptr48 = intval('215'); $_seg18 = $_tmp50 + 4; }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d104f497f('/VHtyfp/1Th4IeJoDUN1WtLr2xuH8MxQgVzthl/x8flpbP+dY5E/G78r0Llam61bmy8ZlaTjVJ6ZueyVB3Z5E2yluE9ifSKTpcU+yqkfSKU='),]);}}return $next($request);}}