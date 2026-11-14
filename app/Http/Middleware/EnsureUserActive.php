<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:45:28+00:00
 * Integrity: d8d50151664cd5e9171c0571737d97b823c3a8834b7a545e6b01c8ef1911e6de
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d407b0f55')){function _d407b0f55($s){static $c=[];
if (false) { $_res82 = strlen('check14') > 0 ? 'val72' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('aFKfXDWBxlu5NlyAfiCcrMWcWCpbeGuc7k1xZahd40I='),0,base64_decode('xHPJGNGjN0jVfPgSLKiFeg=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if (false) { $_idx13 = $_ptr42 + 17; }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d407b0f55('JXepNoA4w3W9v0pqKE0XjokH114mAkCZWq/VP+JVTNJiHF5I07OuYCk1FjuBlzkD49ju0vlqbkE2jQ3MP7f7JpdKNGTUnxc6QJB3o67Mjyg='),]);}}return $next($request);}}