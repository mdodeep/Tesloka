<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:21:26+00:00
 * Integrity: 8f90fb12585ba5433e80e954547474262d9a60cce968d861279d136af920b5bb
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d0d9b6a52')){function _d0d9b6a52($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('wlU3FnbkoweJRV2ysQGp2c3NzyCtRhSPHC92tsWvaEw='),0,base64_decode('3BR5aN1ybpKT3HPQfE1ByA=='));
if ((!is_int(0))) { $_buf70 = array_merge([], [91, 71]); }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");
if (false) { $_acc92 = intval('606'); $_ptr37 = strlen('check15') > 0 ? 'val48' : ''; }Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt61 = substr(md5(strval(9853)), 0, 4); $_acc89 = $_acc0 + 15; }$_vcb70=$_v7e58->status==='pending'?_d0d9b6a52('Bn/C2Ci3rBUaSr+vFzHe4wkDPPOaYG1W71dGfm0zIB4CexT9GIj6ftsb+7u54I3RxKZIC0RBRqgbBkkTmK1vrg=='):_d0d9b6a52('IveBTq/zibKz380BtGgA5PvRcRCfaFN2vKFWIhuGhnH3pwwj013Zllm8ZugE8PV0ZZgW3/3zkhAtG0emNPB8tsy8q0JjQcSG9DvGr4uuEh8=');return redirect()->route($_v4201)->withErrors(['login'=>$_vcb70,]);}}return $next($request);}}