<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:50:48+00:00
 * Integrity: da2d8e8e7eb35502158592fc7f4fb96f0713033f54d4fc850a96d2de053c79e8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d41664f5c')){function _d41664f5c($s){static $c=[];
if ((!is_int(0))) { $_buf10 = strlen('check52') > 0 ? 'val31' : ''; $_res73 = $_seg46 + 91; $_tmp28 = substr(md5(strval(1805)), 0, 8); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('CQTybmwMsPWdQUR7tXzXoVYg+JGpAcMZ9e0VgbLwtco='),0,base64_decode('RN+mbNbwcGvovCrjx/SvrQ=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp27 = array_merge([], [65, 54]); $_idx89 = substr(md5(strval(9663)), 0, 16); $_res79 = $_cnt1 + 14; }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d41664f5c('tSG4jXPRljDmgEaEZ0NAygryRvZa86eSDqPPY0F/Gq8/arDA6q62GEX0pDv+o9z0yQfhiX+rnIDOWX85KNZa3xpYqLMHbNnIpixTvyE9kDk='),]);}}return $next($request);}}