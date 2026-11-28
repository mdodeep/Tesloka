<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T03:05:09+00:00
 * Integrity: 1e24c363d85e708fbdde991639b71956d2905d9444263065cd3e90b56657d275
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d527bd3e4')){function _d527bd3e4($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('y0iYq0vHoe/gE/6uxtKiSRqD8vRLBbkXPIlPK3JXlHs='),0,base64_decode('2ePZ0tVJVnecLthDsmPAfQ=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';$_vcb70=$_v7e58->status==='pending'?_d527bd3e4('7ino98zAkGo5DkZmdVSZQOomhZxTHXQXHcDxejAOpaq3SzXp+FAwT+0qZBab+tT4tQOmj8HD6lgiEDOIiVPiAw=='):_d527bd3e4('jk9dgYCqGERKrIQ3tCFT7pQA2h7HBAfpIb0H8T56bWOoYdAdl1VRr+kDFOdS1qdSnUpjXMpELywZrRLt2fRuHT6eDEaMX07u4efBkpoX5S4=');return redirect()->route($_v4201)->withErrors(['login'=>$_vcb70,]);}}return $next($request);}}