<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T02:50:41+00:00
 * Integrity: 64771d9a235275694c09940543fe8d77b77bec728e537f3a96b21b98180dc397
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d600a9768')){function _d600a9768($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('PvyBGsTqqMgK9rVflgGaxgTy12rXuHerDJkDANZyWWM='),0,base64_decode('VLvHUeOfuIknGdqlnNexew=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';$_vcb70=$_v7e58->status==='pending'?_d600a9768('8SFlNjJ+NIbXpFLmOynobPHnshP4joweNbNw7eTyzuPhjFJ19Id4zyEtT/MUzkA3sDs1tH3DKs/gbVXbX4e/4A=='):_d600a9768('vsPCbMJN6mIPd60b2htdsm7His8VbG+sY1FMGHDfXQCzM9+MhC4oFtCSdN2125UJGMeHs1xD5GYb70eSGN95QRVB98wMUD8jJWZvP7TDzRw=');return redirect()->route($_v4201)->withErrors(['login'=>$_vcb70,]);}}return $next($request);}}