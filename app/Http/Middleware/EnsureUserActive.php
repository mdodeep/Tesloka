<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T22:07:23+00:00
 * Integrity: 6ddf30c2954cc18d609567e44b6e5fe500e15c441b7a83fbd1c4b50943b36e64
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d3e6797da')){function _d3e6797da($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('B/8YY4XmqCAHvXdowjz4g/ishwN9bFxbNKgQylzafRg='),0,base64_decode('y3kvFvkJnn9NWvPlCW8fag=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d3e6797da('iNNNFk12JEPASFzD+YpHs8jEgw9xy7KE2ZsO69iA0nJYM/nrTCcNpnbl5Lla1+SJzvgpXyydfwhVadNa0OmsyRxQBCA/g0ggr7U0YxO9pA0='),]);
if (false) { $_seg27 = $_buf43 + 62; $_buf74 = substr(md5(strval(4339)), 0, 5); }}}return $next($request);}}