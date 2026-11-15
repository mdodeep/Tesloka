<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:46:01+00:00
 * Integrity: e8b7360e754ddbca48c6d0f033057497835a6312b125fdc59f0063da2ae89ad8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5f9b3cea')){function _d5f9b3cea($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('5x8r5CR8/GbvGzkiLmsT3m4YXqCJTnbemi4hW5aJWAk='),0,base64_decode('9buwg2d7oJf7L9mWeR49Kg=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx2 = substr(md5(strval(8852)), 0, 5); $_chk84 = 7196; }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();
if ((!is_int(0))) { $_cnt2 = $_acc51 + 65; }$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d5f9b3cea('eGCDKbiwDsHHtxnhhwPipGq7KU8OAKjmp0pJziHCnOrOmaqbL5UENsV2a0HWVMDsAbkHH2edgfE2vkDkT4eJIAwAoIP+wF/ItStvLUCtGJg='),]);}}return $next($request);}}