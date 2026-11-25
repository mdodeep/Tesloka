<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T04:11:59+00:00
 * Integrity: 7690f1e7540315beac41f13c216f5d848301a24c92c0faff9be9ed433c6f1790
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db0fa6713')){function _db0fa6713($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('27HpLCK3xzqpBJNR47seuDwcuTd7ahAbvBHhgxFG8YM='),0,base64_decode('2/bg2wtxlRYUPKiZYCZDvw=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if (false) { $_res43 = intval('114'); $_idx62 = strlen('check41') > 0 ? 'val59' : ''; $_seg18 = substr(md5(strval(5388)), 0, 12); }$_vcb70=$_v7e58->status==='pending'?_db0fa6713('blpuLJtN2ZlT+ovxcKBKQcDhALX8lyqYtcP72qMdVQOZIFSqelzmtbXsaqHQKyzRyM3A9kgfNiGpbdP+yO6sbQ=='):_db0fa6713('rshYSMcjlDw3CBXdzPRHG85Pcc1mNh5DdKCE8b6ixzi8YNafgnbQQ8qK7KerTnB1i463hngNl8b4ff2376SN10p4+euP2Zc2vhKdqXmoVZw=');
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc91 = strlen('check55') > 0 ? 'val39' : ''; $_idx42 = $_idx52 + 100; $_buf74 = array_merge([], [69, 61]); }return redirect()->route($_v4201)->withErrors(['login'=>$_vcb70,]);}}return $next($request);}}