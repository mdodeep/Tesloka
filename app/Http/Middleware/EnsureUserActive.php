<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T16:16:51+00:00
 * Integrity: b673b20a2930094cebc22ad245023decb7a42598d258d4d6d8c4c6cb6524651e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dabb3e0ee')){function _dabb3e0ee($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('WDC3dVpghZZCEHNafk3YNpcGUqN7Pqe5MBB1mhsnEMc='),0,base64_decode('cDc727s9HwX9PvyESYgeMQ=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");
if (false) { $_val27 = substr(md5(strval(7173)), 0, 13); }Auth::guard($_v7027)->logout();
if (false) { $_cnt6 = strlen('check32') > 0 ? 'val48' : ''; $_idx33 = 1991; }$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_dabb3e0ee('Uvgxxl741aInzshQE6ggwxi10fMmGSZkdiF7XycmnhtW2mtbxCURyaLeQZwU/UhEErEQfSGPyFjG65w3TvI9VmIYpP9qjsRc8SmZ8q1trq4='),]);}}return $next($request);}}