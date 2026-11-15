<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:46:25+00:00
 * Integrity: 5dc076367dca2aca8216f163718bf09dc1ac6d174d5e80534a1715a9a20a58f6
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d3e2c5738')){function _d3e2c5738($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('X4L81lvlEO4/NbZqDxGeAKflltbg9Kr3G2dC5c1qfUw='),0,base64_decode('R2NgxvLwD5b9LFftrMxSGg=='));
if (((0 ^ 0) !== 0)) { $_ptr56 = intval('915'); }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();
if (false) { $_res89 = array_merge([], [24, 6]); $_tmp52 = 758; $_tmp18 = intval('405'); }$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d3e2c5738('m5asqrOo8NdpwY9kz6NpHoj8RezxxbuIMQF1iNwd7zpAT7RCmtPDpQDpz8x/sTQrbGENkB93F3M83+pVKHXugk5GhRpIY4px5sO98tQFF1c='),]);}}return $next($request);}}