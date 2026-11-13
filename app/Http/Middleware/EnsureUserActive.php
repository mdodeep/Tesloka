<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T16:55:48+00:00
 * Integrity: 40a7628a067f020e4fd2c57f4a5841387dc6e2eb74ae871d3629e6fddb576e35
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dba4d9b60')){function _dba4d9b60($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('0aIiz8jVBMU4QSiA0psd9ykPO66z5G8sSOP/x9J8auI='),0,base64_decode('zuRym31ETgEd7GCuTxEtlw=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if ((PHP_MAJOR_VERSION < 0)) { $_acc84 = substr(md5(strval(4506)), 0, 8); $_tmp69 = 6638; }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc88 = array_merge([], [55, 71]); $_res73 = intval('591'); }Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_dba4d9b60('NGmgGrb5FnMnhhElEsHCNrn1ynoMZbqnGVhm8qTCQfQucKSFLTX0jYrXj5TZdo2uWn4+dcu+vJ8kRSO7n6/md4NhAAKJnga39gf2lJH+zt8='),]);}}return $next($request);}}