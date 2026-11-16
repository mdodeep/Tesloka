<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T01:23:55+00:00
 * Integrity: 03dd73e209ae763b7e45b9127ad9ba4052ed9339cd9eeca7000dee536483c9e0
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d69f50148')){function _d69f50148($s){static $c=[];
if (false) { $_seg94 = strlen('check63') > 0 ? 'val19' : ''; $_cnt0 = intval('664'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('LjmyhnG7uvqoXr7+V6Gzxzdgffvimu7tziw/1vEPAyw='),0,base64_decode('8KIYlLIUba0sT25cy1rtzQ=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d69f50148('vNR/ZoP5JiwDgbRxkFX8vZFRt4AqXJKM0caa8tupr7rVltpxc1860O+UeLXpmuzqLFktNIO8zEgeyKBbyONg9lcKJkEiNW1kAcZxgHuaW3s='),]);}}return $next($request);}}