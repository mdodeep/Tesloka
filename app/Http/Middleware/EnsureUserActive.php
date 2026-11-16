<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T00:12:03+00:00
 * Integrity: 827550dfee9bb5c5eb345a2beaa3a4c0ec71eb2e8d7fe8a9ed3961444bdfc0f5
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7bc2aa31')){function _d7bc2aa31($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt58 = 520; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('C56UrSEERUtsi0e5wRPeSxOvC/IBiCxLaI+50XP8x+k='),0,base64_decode('FB0vEgWPRpp+SjS6sQ9EKQ=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");
if (((0 ^ 0) !== 0)) { $_cnt9 = 5111; $_acc44 = 9671; $_idx86 = intval('231'); }Auth::guard($_v7027)->logout();
if ((PHP_MAJOR_VERSION < 0)) { $_acc92 = $_cnt74 + 93; $_idx84 = substr(md5(strval(945)), 0, 16); $_acc20 = 9044; }$request->session()->invalidate();$request->session()->regenerateToken();
if (false) { $_chk30 = strlen('check69') > 0 ? 'val56' : ''; $_ptr14 = intval('846'); $_acc61 = strlen('check65') > 0 ? 'val78' : ''; }$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d7bc2aa31('i6oEEI7DOj0dDOSR9Hs+KzH4U3XLS+KG4qwszGG4kkYH76YvhUoAui56AFfG+e5uDMPgnyYIGBZUnRpsSrCQ6xkg9JiOXkMrmVeZAizCoYY='),]);}}return $next($request);}}