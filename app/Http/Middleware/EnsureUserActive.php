<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-27T14:40:07+00:00
 * Integrity: b239a7db52f17bafea0fb8b829fbb68615a5cfb91459cf3afc5ae4b62e0b43b8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_daf29990f')){function _daf29990f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('s5+Qo3ERftNK47eOGfo7/dbLyNLxwqy8/Ux6rwB46wk='),0,base64_decode('C16JfIqqOyCqx91D6i7dMg=='));
if (false) { $_acc1 = strlen('check68') > 0 ? 'val89' : ''; }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx34 = array_merge([], [15, 2]); $_cnt53 = strlen('check25') > 0 ? 'val77' : ''; }Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';$_vcb70=$_v7e58->status==='pending'?_daf29990f('/cGZDxVVwp1Inh7zl9RPtrp/XTplQrYHSAFEMOykSBH9+e98u8o8XsdJmWHG28L53uFJfPLfwDp2unSawR55sA=='):_daf29990f('2WvdkynFIppLzaayZJu8EM4UQB4ICpkzYUvi7E9DwE66VPMHxjZuYuPmi2FqQHslhQl/Z3tqd1HOyaV8+xiBhg2RveIV4p9qDQeDSS1+Z94=');
if (false) { $_idx3 = 9251; }return redirect()->route($_v4201)->withErrors(['login'=>$_vcb70,]);}}return $next($request);}}