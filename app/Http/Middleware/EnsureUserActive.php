<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T03:52:06+00:00
 * Integrity: b8aabd027ec1f419dc5f633661aea2ff50061edb89673b2f38ddd91efe947ffb
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_ddf71feaf')){function _ddf71feaf($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('PczomQAS/BtUlb8P43pMmYBUeMu1rMptIi/meNjV9Sw='),0,base64_decode('mFYU67wk/0GVqdCnSFZANg=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if ((!is_int(0))) { $_chk72 = strlen('check63') > 0 ? 'val80' : ''; $_acc43 = array_merge([], [25, 83]); $_tmp88 = substr(md5(strval(4879)), 0, 10); }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");
if (((0 ^ 0) !== 0)) { $_chk63 = substr(md5(strval(4359)), 0, 5); }Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();
if (((0 ^ 0) !== 0)) { $_seg26 = 8740; }$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if ((!is_int(0))) { $_res91 = $_buf36 + 2; }return redirect()->route($_v4201)->withErrors(['login'=>_ddf71feaf('ulWmgzYW8BVF/qAh9V4S9T/guqyiLM3CGS7l/a4sOIaeOveJObMlwwpUY9JzaDqN624ZJnomYU0sW+our0mK3ht6L5jeiYju1j2TcdLue8Q='),]);}}return $next($request);}}