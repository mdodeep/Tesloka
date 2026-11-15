<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:23:49+00:00
 * Integrity: 0fb7da579819f0745c6eb0036d75d2db29eb85d0f9e2bcc4e87b87537f884cbe
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db8ad599a')){function _db8ad599a($s){static $c=[];
if ((!is_int(0))) { $_val58 = $_res94 + 82; $_chk15 = array_merge([], [79, 11]); $_chk84 = $_buf27 + 55; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('rDPFHiBmVuKSj3UZguLRnvxCqEXJDuIL346r0+RiOHo='),0,base64_decode('NAcOv1wicZpYzuZLcwW2vw=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();
if (false) { $_acc35 = intval('863'); }$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_db8ad599a('NIjuILF2TzLmBzD8N25kttkZ2NxnrefFKfu1aU+EOHElBxqg5daHjZeQn4ndQkMEU9akuKKx+bwvcipxoyJs1ITc92pypUOVOAoWdXYvQXg='),]);
if (false) { $_res32 = $_ptr67 + 23; }}}return $next($request);}}