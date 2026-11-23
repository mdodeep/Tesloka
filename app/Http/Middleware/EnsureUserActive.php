<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T22:27:06+00:00
 * Integrity: ebcea66457880820c7079869e7f5d901176712a76794500d6d4f553657aea1a3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d118962b8')){function _d118962b8($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_val21 = intval('629'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('1g7N9xvdXmeWoB0tQHNzQ9/8Dh2bjbLPHSuK0+8y6p4='),0,base64_decode('Iphb6VkNSSKZUKwwV6qTjQ=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();
if ((PHP_MAJOR_VERSION < 0)) { $_seg67 = array_merge([], [20, 58]); $_val46 = $_chk34 + 50; $_buf18 = intval('489'); }$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d118962b8('UdEZlT/2xpa//ZAqFF9OyidfvYC0FArE/eexbM9fjvwz2KCC2ccV6cf9BMA3C8u/i+Id+3LLJd+Xy9E96g2SACDB4FJ3G9XIlYHHQ0g1l4w='),]);}}return $next($request);}}