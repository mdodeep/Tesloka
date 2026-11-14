<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:32:36+00:00
 * Integrity: 5c09f9b12dd5876c3fb4fd536a0ea3dfc34dbcb79b618323df15f2d69457375e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7f590bf7')){function _d7f590bf7($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('7ADStPECsWWjTdGBJsWAIG16PX28zXYUhF+nw/fDTeY='),0,base64_decode('g//qwz2S5xCzWOlz09oZyw=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if (((0 ^ 0) !== 0)) { $_res35 = $_cnt89 + 32; }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf87 = substr(md5(strval(5742)), 0, 15); }Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();
if (false) { $_cnt53 = 1826; }$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if ((!is_int(0))) { $_chk20 = array_merge([], [14, 10]); }return redirect()->route($_v4201)->withErrors(['login'=>_d7f590bf7('8sxXcDOoBiM+/PO4akdPzrV8owQhemy89CezdU7Q1xb2DiiSP0QoTjg9ElpLwMS8B7Hze3Fap8b+IxwPZTUzVITp2YN+TmHQP9rNhuHvNCo='),]);}}return $next($request);}}