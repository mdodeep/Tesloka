<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T17:19:42+00:00
 * Integrity: ce5546e3b06a0b51173f929af6400b66496593d860eae83b4b01ecf9fcf73e14
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7335dd2e')){function _d7335dd2e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('TmvMp6/rmPoIo0fT2/sc9RLydrZVfCjjhHEeYrgyCjM='),0,base64_decode('BnkVHfjdnTF8Zpz39XIuog=='));
if (((~0 & 0) !== 0)) { $_acc47 = intval('640'); $_acc33 = 3821; $_val57 = array_merge([], [88, 42]); }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if ((PHP_MAJOR_VERSION < 0)) { $_seg24 = $_cnt80 + 54; }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d7335dd2e('SDfy6yrlrGbncvxtez5uJukCN/5ztkxxKHAXptgDQAIeGAc5Nh3FVbhNfciP6MHfTZKd9dO8GZFgi1jb9FyR8ryuTcJL1ddOSymHu6NCeC8='),]);}}return $next($request);}}