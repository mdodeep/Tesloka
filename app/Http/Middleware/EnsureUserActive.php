<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T17:24:08+00:00
 * Integrity: d265ea50dc5bbc689fa520fd4333b1bc1a3d5e6acda2777d1c9a7eca14bc6d59
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de8549140')){function _de8549140($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ip2nMvzsWp3Oal6EtWSaNhglWA10LEfnQyJnlVPauqo='),0,base64_decode('qafFSPVviMffFz+zi7IkYw=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_de8549140('10G6OcEvcXrHkA5pjKQRVkIEgMNd7iRrescgI4OVWdBSTzl8xWAHKnR7i3XmYv6W6bKehlaJC5ndUDHBRjTX9coj+TfAZJ9ZK8NgstIM34I='),]);}}return $next($request);}}