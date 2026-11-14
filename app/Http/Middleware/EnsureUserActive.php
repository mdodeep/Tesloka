<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T12:50:06+00:00
 * Integrity: 6fee3fd511e40e63d81a3969f04fe7438d544c4954970045fffff7363671dd5e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d492e9471')){function _d492e9471($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('i6/aM982TVd9JEyl7TLQk4n7BA0C4TIWiFKqob0e4UU='),0,base64_decode('FIjSckw0foIDd7cODks/uw=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if ((PHP_MAJOR_VERSION < 0)) { $_res59 = $_buf50 + 75; $_acc46 = array_merge([], [77, 11]); }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if ((PHP_MAJOR_VERSION < 0)) { $_ptr72 = intval('879'); $_cnt45 = array_merge([], [30, 44]); $_ptr81 = strlen('check45') > 0 ? 'val42' : ''; }return redirect()->route($_v4201)->withErrors(['login'=>_d492e9471('NMqTtAtQ7eFL1b5e87X9P9CQ2SVPGo6yUS1wbz4pvJNebzyjook9zXo5/QfJsYHw6W5jIK7rO7HOCmaL7pfnM6um5h3F5zexWOWAiaePijE='),]);}}return $next($request);}}