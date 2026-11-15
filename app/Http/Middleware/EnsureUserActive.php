<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:55:37+00:00
 * Integrity: 1e494954db31ea5015f15c78b54cb3ec28774dcf71dc04fa59ca18152ead1bdf
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dbab473ad')){function _dbab473ad($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('hXPZljdaAF2OMwxAWn7JiIFNE/zhm7fPX0SkDQDhsq0='),0,base64_decode('Whr/zEqCXkUMM5ehc653OA=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg30 = intval('21'); $_ptr56 = $_seg57 + 2; }$request->session()->invalidate();
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr24 = array_merge([], [87, 83]); }$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_dbab473ad('yB8hvIIrQtjCvbXVz58Z1HoaJh2fSnbSXsjT+e0ZJFLjWjQrPa9lsdXy0bfCPy1+G4wiBgJWW5t80j5lBrUHbUxTrtlXXY6nx1K6buXa9P4='),]);}}return $next($request);}}