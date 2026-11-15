<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:40:28+00:00
 * Integrity: d8afa62270f139dce3d4ed0f9766ada15192a183d4abdb06565216c2901cb57a
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d20386104')){function _d20386104($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('V0GZtfZJg0Xdht3+F4zG199s6QEUR2ptdxiKWB2ebC8='),0,base64_decode('uY3QIYJdRQ5u067BfBAe5g=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if (((0 ^ 0) !== 0)) { $_val25 = intval('284'); $_chk93 = $_buf3 + 9; }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if (((~0 & 0) !== 0)) { $_buf91 = intval('563'); }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();
if ((!is_int(0))) { $_idx0 = array_merge([], [10, 44]); $_ptr31 = array_merge([], [29, 67]); $_tmp88 = 7696; }$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d20386104('NImTTIZgAStzRh1aEJguvDlQRHz2A5koiNPoCRaEGl1n3UwKm7wm1flYUTTVIzaTPyxciSyziwMPuOyqxjEYmFi+xDMCyYDNCJeWLh4+NzQ='),]);}}return $next($request);}}