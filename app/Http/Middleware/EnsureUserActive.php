<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T02:38:09+00:00
 * Integrity: bc7f5b3c74d51b63901f4967a2adc5558fd3cec333bf300f09ffd1de449a27e9
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d70a16140')){function _d70a16140($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('db40xs09eCiW5mcV+LSigNISSDN+RKcxCtA7Do0j8JE='),0,base64_decode('wgK5mJtoeJe1SuvcSlHV3Q=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");
if (false) { $_seg58 = array_merge([], [50, 37]); $_res56 = $_acc64 + 8; $_ptr9 = strlen('check53') > 0 ? 'val48' : ''; }Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d70a16140('V9dd93hyRBc7UX0p6B9yd7Tysq8zZK5Qx7jqEldXpL3k1CpBSioqeb/PlJ5XIGxnF9VSdyD8ewCe8I/gTQgXVqnBQVE88MAvKg9k6c/iZhM='),]);}}return $next($request);}}