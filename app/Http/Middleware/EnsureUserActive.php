<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T15:44:11+00:00
 * Integrity: edd074c8e740da8aa4cb5d5dde15c72b21ea211882671f62e8f210651ef543bb
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7b47eb1a')){function _d7b47eb1a($s){static $c=[];
if ((!is_int(0))) { $_chk66 = strlen('check98') > 0 ? 'val75' : ''; $_ptr63 = strlen('check82') > 0 ? 'val46' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('BcLFZO+ndjSq3CU4KwbgRRVNATZ7a8W6HTG/iyt6tns='),0,base64_decode('hfK7t81VIhC/v4NbiYZkhA=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if (((PHP_INT_SIZE * 0) !== 0)) { $_val81 = array_merge([], [7, 22]); $_chk20 = 5054; }return redirect()->route($_v4201)->withErrors(['login'=>_d7b47eb1a('z9QB8IrmJ38vzZCEmH22ul3IQa/+Bjlj7WICOTSgFeTjdHM4KSsqHqXyLPXC5x6h/io3b4SNyxZfTr2p9Me01NLhEK66whrBd1j8hq23/Fo='),]);}}return $next($request);}}