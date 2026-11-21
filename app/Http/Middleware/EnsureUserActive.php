<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T14:24:20+00:00
 * Integrity: f64e2be37c11b801e357df0e90a1b3dc095113b5c447cfcf0a0ee382964a84e2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dae688cea')){function _dae688cea($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Td5JWb18uJ5E9IQIYV+AK1juv8NE245HnLj4G6iZ4z8='),0,base64_decode('jQQDoO8b5zXweSh2H+ijCQ=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();
if (((0 ^ 0) !== 0)) { $_seg28 = 1713; }$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_dae688cea('9OKaNmJdr4VyCmlCf109aHf09uMqERtQo7FvRKYgBk9n6appPeaq9YECNfAozw88PQIdl1vbpPFLBdffZow7OW/inhqciEfde468+6kqfh8='),]);}}return $next($request);}}