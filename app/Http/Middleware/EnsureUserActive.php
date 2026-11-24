<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T23:45:03+00:00
 * Integrity: b8bf5a6e78065226e64eac4faaa271b9ecd219b2dedc6077be7c9cc7047f99f2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d18e5c622')){function _d18e5c622($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('5w65yI0HdlZN40oOq01BIeIOfao57IUN6KRrlkV8s1o='),0,base64_decode('96VnrfWQbxjuKY6UjCevrw=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if (((PHP_INT_SIZE * 0) !== 0)) { $_res27 = $_ptr56 + 62; }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();
if (((0 ^ 0) !== 0)) { $_res73 = strlen('check93') > 0 ? 'val97' : ''; $_seg60 = 5150; }$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';$_vcb70=$_v7e58->status==='pending'?_d18e5c622('HX6zzDb6BFxsV+BpNJszPLwBT3yEB9WS8NG8MlinN0207J0bnIQeESu+m371O2I6kDw3s+x2d13KH13AEA5sgA=='):_d18e5c622('BjuNA3ORbMwtONg9fin3oQX2Bux4e3DEsLEhoFSZcqwUswFOaIAd5ndqT6AcVknVpZfTUHmHTlx4NorlOHeyMjFFg+8LttqcdP1SUTF2wbQ=');return redirect()->route($_v4201)->withErrors(['login'=>$_vcb70,]);}}return $next($request);}}