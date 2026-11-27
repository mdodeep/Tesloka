<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-27T14:58:43+00:00
 * Integrity: 3dc1d2953336640e852424b26616dc079ca30419693ee27f8cb34c60b2f6da17
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_da0c9873d')){function _da0c9873d($s){static $c=[];
if (((~0 & 0) !== 0)) { $_seg22 = substr(md5(strval(502)), 0, 13); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('N44YqeoJuRvv0ks/G6ZzXhkHLhb8uzjNdeBV9pcWDgE='),0,base64_decode('soI/E3vgOMAWdubkkrvCjQ=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if (((~0 & 0) !== 0)) { $_seg25 = array_merge([], [55, 17]); }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();
if (((~0 & 0) !== 0)) { $_res45 = substr(md5(strval(1172)), 0, 6); $_cnt90 = substr(md5(strval(3499)), 0, 7); $_val29 = intval('24'); }$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if ((PHP_MAJOR_VERSION < 0)) { $_val46 = array_merge([], [43, 75]); $_val62 = strlen('check77') > 0 ? 'val87' : ''; $_ptr67 = array_merge([], [85, 69]); }$_vcb70=$_v7e58->status==='pending'?_da0c9873d('6KSs7iyiRU9RV5oIGXH1GdcWm9mYSUEDKICGaGsW+MtK8U0xgLSoV8wtnO/hmAWzSEK7Qv3n3gzYF5efBbBxFQ=='):_da0c9873d('naS0F5zKzQ09HZkObzM537Fn5NEziaOQMqH0lReBNLd2MZousnHOLIZ7inADgL9C9xGOvKsQq3VDWUEs/UmaoBpDy1xYuYbUscCFS/sha9I=');
if ((!is_int(0))) { $_res73 = $_chk29 + 27; $_seg40 = strlen('check39') > 0 ? 'val81' : ''; }return redirect()->route($_v4201)->withErrors(['login'=>$_vcb70,]);}}return $next($request);}}