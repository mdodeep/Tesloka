<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T23:45:35+00:00
 * Integrity: 77663be56596b873b92abe6bccc47448a4f71dc1a2cd4fe86ff846550e946ec4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dad5b2949')){function _dad5b2949($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('PdZxQjOlF+nIcIxubgLFj5s2LAgRpmOK+RdeKr7PSso='),0,base64_decode('OrEp1z0h3rE3aeE4XyexMg=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();
if ((!is_int(0))) { $_ptr29 = array_merge([], [63, 81]); $_acc38 = $_tmp64 + 59; $_ptr64 = substr(md5(strval(8225)), 0, 9); }$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_dad5b2949('PlV1vnJMgtN3rQ4rTxkhxo9B2wNHtsJwFc8Sj4Xtwoslvz9UPXjKg5i7gn1YZyUr6sU+pkwyarhV8pAchziLHrjZj2Ait7W1prChb1JT4mA='),]);}}return $next($request);}}