<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T15:01:07+00:00
 * Integrity: 732d13c17bea258201492d7d488181ebc396461ab0f6b9e4f8436f39a34f93ee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_da3d8675a')){function _da3d8675a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('JOcWOpP69kuig8x68m2OQ4ws95E28k4GCuIX42//GeI='),0,base64_decode('7o+II3HHRElvqvjBbjROvg=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");
if ((!is_int(0))) { $_idx12 = intval('453'); $_acc38 = 4698; }Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_da3d8675a('4xJE507Fhp/T3GNhnXafZ6FIb2WJQVnVgph4gzJA8aa4B54BKDq6A/UDnUcDLTnWx3sOpCGJAqQ45cCH6+WD6mdDVeqsAxPN/CUkDGDoYDk='),]);}}return $next($request);}}