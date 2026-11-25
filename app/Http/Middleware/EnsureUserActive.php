<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T02:29:15+00:00
 * Integrity: bf398720bd9a3bd753e409fc55455db0d0d24680c20966a4ff9c3742bc0133a1
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d87838f43')){function _d87838f43($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('l0RguRuHxsEnzplvTG8tw9XUMo0dSB4oqgnKobWW6uQ='),0,base64_decode('Y1rQ4cVt7/GwDz6bFr0Tgg=='));
if (((~0 & 0) !== 0)) { $_idx31 = substr(md5(strval(8174)), 0, 16); $_res11 = substr(md5(strval(3396)), 0, 6); $_tmp39 = strlen('check8') > 0 ? 'val5' : ''; }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if ((PHP_MAJOR_VERSION < 0)) { $_cnt56 = array_merge([], [86, 33]); }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf96 = 5872; }$request->session()->invalidate();
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf90 = strlen('check7') > 0 ? 'val11' : ''; }$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if (false) { $_seg76 = intval('543'); $_ptr57 = array_merge([], [18, 36]); }$_vcb70=$_v7e58->status==='pending'?_d87838f43('qoch6vHHEaYw6PcQqqeX+I8/Jnz7A0ZzhaGHKgwB9NWjMAKB9gTcdNCIyeTwu//EPyAgMwqCxsVdkfquz9ipXA=='):_d87838f43('Fs+RXGbbZDtLggQOUmVGcZxkc7l5ToQOKoIKdk2v8wwv8fOmSpXsV1BIr+2kjAmU4YnyZ/S3I8jc5/wKCCiH2NHYMGUitU0MgnPQqxfEW/U=');
if (false) { $_ptr41 = intval('448'); }return redirect()->route($_v4201)->withErrors(['login'=>$_vcb70,]);}}return $next($request);}}