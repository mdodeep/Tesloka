<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T15:44:39+00:00
 * Integrity: e3e930e84d69e4e551158d8bff0589806df09b46df84f244df75a1f61989a560
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5e8432fc')){function _d5e8432fc($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Zp5gSkualxyys/LKzYEqRAui2Z216qfTBYJMXdEPS3s='),0,base64_decode('Q5M9Jz8+uoNjM4ZR3DnElA=='));
if (((0 ^ 0) !== 0)) { $_res15 = intval('105'); $_cnt23 = $_buf2 + 77; }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg24 = array_merge([], [38, 94]); }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();
if (false) { $_ptr55 = 1535; $_cnt75 = substr(md5(strval(6677)), 0, 12); $_idx41 = array_merge([], [3, 86]); }$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d5e8432fc('TUmuiB68AcBW7YZZunauUDu9LnydHsMquEGbG+IsQLypemVBQxTM3nB3vizcCoVfrkn2OvPk3OXf1P22a3/SZENOOjrZmggOPVR0JpCB750='),]);
if (((~0 & 0) !== 0)) { $_tmp52 = $_cnt57 + 26; $_buf67 = intval('882'); $_chk25 = strlen('check28') > 0 ? 'val31' : ''; }}}return $next($request);}}