<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:52:39+00:00
 * Integrity: 2474375cdffefca3312fed197f4d5978af35cf7ce2041d9337b6c641bbaffc53
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d4a06c80f')){function _d4a06c80f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('7S/Z/WID4iPSh2TNqt861BF0yBuQWoYxmJ0ujFdMOaQ='),0,base64_decode('Hhpujt8tcH8ugZeWCs4/+A=='));
if (false) { $_idx81 = intval('854'); }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if ((!is_int(0))) { $_tmp49 = strlen('check43') > 0 ? 'val0' : ''; }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();
if ((!is_int(0))) { $_cnt29 = 8029; $_acc93 = substr(md5(strval(7228)), 0, 12); }$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if (false) { $_buf58 = intval('137'); $_cnt84 = strlen('check18') > 0 ? 'val43' : ''; $_acc57 = substr(md5(strval(2714)), 0, 13); }return redirect()->route($_v4201)->withErrors(['login'=>_d4a06c80f('xT97NlkAgc15nR4OfOO8aZelrN06Vzlxg7bVcjuUaQOUTp/JkFpXBxgLhG46e6b6cDyGmERlfJKfMrVVE+HSUkRSOZ0aIn0o/iXe4MajIWI='),]);}}return $next($request);}}