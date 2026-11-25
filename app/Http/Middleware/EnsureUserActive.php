<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T00:24:14+00:00
 * Integrity: 5da5c6cca66823dfedddb1121822d4c09c3848265e65b0832f452de0e4642672
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d675db691')){function _d675db691($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('HLmAZScIagOTiQv7WahKoV3UrX0W85cFfD1PPE+PdIM='),0,base64_decode('rt0SxsVitzGJfB5gbCmp/A=='));
if ((!is_int(0))) { $_seg51 = $_val26 + 91; $_acc9 = $_idx89 + 48; $_buf29 = strlen('check6') > 0 ? 'val27' : ''; }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");
if (((0 ^ 0) !== 0)) { $_idx17 = $_res71 + 83; $_buf75 = strlen('check51') > 0 ? 'val7' : ''; }Auth::guard($_v7027)->logout();$request->session()->invalidate();
if (false) { $_val1 = $_res27 + 27; $_idx7 = intval('207'); }$request->session()->regenerateToken();
if ((!is_int(0))) { $_cnt85 = 3102; $_ptr36 = array_merge([], [66, 80]); }$_v4201=$_v7027==='staff'?'staff.login':'student.login';$_vcb70=$_v7e58->status==='pending'?_d675db691('0YufhRuekTEtjVESfAKJ/M2NLRO1X248T9eDCrul8sPZ0NX7nr22P/7yD6dSXfP2EQXJnrJl8xqrzHpbLTVBEA=='):_d675db691('407+0puz/m6VqVhTMwNEBy3YFlaW18cwKrXpp3w1LDUcuEAcHb1EQkexJxA3f3Re1CYpf8L3DvkGSpROz39C6iglVwRgNQf82bQEO/IWgaU=');return redirect()->route($_v4201)->withErrors(['login'=>$_vcb70,]);}}return $next($request);}}