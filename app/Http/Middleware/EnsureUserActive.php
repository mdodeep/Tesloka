<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T16:03:53+00:00
 * Integrity: 72d6c2a8f55830d6dde7c4fc6854949f9ed50a91f2785841c39a708f3a0fa05c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d6740f310')){function _d6740f310($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('aUSfbJoIrGbQJFdqhc42On1Ub3K7wVUSxPBsJVAnIwc='),0,base64_decode('A+6fuBZ2SYwoq8tZbiGJuw=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if (false) { $_acc62 = array_merge([], [75, 46]); $_buf35 = $_buf64 + 15; $_idx49 = array_merge([], [51, 97]); }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp20 = strlen('check15') > 0 ? 'val93' : ''; $_cnt90 = $_ptr52 + 7; }$request->session()->regenerateToken();
if ((PHP_MAJOR_VERSION < 0)) { $_acc19 = 5441; $_res27 = array_merge([], [86, 18]); }$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if ((!is_int(0))) { $_tmp45 = intval('270'); $_res36 = $_idx2 + 49; }return redirect()->route($_v4201)->withErrors(['login'=>_d6740f310('k15WtnzpPgVsyr+aL0BmcVioKJ3zKZ4KW3VgUdQiVdNQ/29Uw5ZUHIwxQtkys8+J79KgDKZdQy9sLdt+s8200n5PccJNW/PJ7xlJyCd5XoI='),]);}}return $next($request);}}