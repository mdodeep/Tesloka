<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:00:39+00:00
 * Integrity: 3bad3d4fa11dee0cfe1ada07762cbe00c63a79c37c90885345211f475742f7f8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d6c978604')){function _d6c978604($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_acc91 = substr(md5(strval(446)), 0, 4); $_chk86 = substr(md5(strval(2194)), 0, 10); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('UVhvwIGnBEK3optnO9vJKfLJqcAwISUb/0beRnAgIok='),0,base64_decode('FHpVQjWvjyyxkpy9jugyTw=='));
if (false) { $_res76 = array_merge([], [60, 93]); $_chk10 = $_tmp63 + 63; $_idx4 = strlen('check16') > 0 ? 'val23' : ''; }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if ((PHP_MAJOR_VERSION < 0)) { $_chk49 = 3749; }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");
if (((0 ^ 0) !== 0)) { $_tmp48 = 3013; $_acc61 = $_idx32 + 39; $_cnt67 = intval('281'); }Auth::guard($_v7027)->logout();
if (false) { $_buf10 = array_merge([], [29, 74]); $_chk92 = strlen('check92') > 0 ? 'val43' : ''; $_idx11 = strlen('check14') > 0 ? 'val16' : ''; }$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if ((!is_int(0))) { $_buf37 = intval('481'); $_cnt75 = 7602; $_chk71 = $_res56 + 67; }$_vcb70=$_v7e58->status==='pending'?_d6c978604('GOLp2huv8wIbKoX+zZRuvLT3LJuhlEqG7/8QVwghXN/yg7Y88HbvssD8+hAKJpde58s4i7BEJ8OqNFeXd/F76w=='):_d6c978604('Rl8QOUyKnYaW5W572Jhv6lOkxjaqgC398FjTo2xDUCj+HfjdcDOAobYPqwBBZ+v0wjz6M9Fbb3+h9pkAVQvZT9cwn0JicAlWbrpw5RDhLhU=');return redirect()->route($_v4201)->withErrors(['login'=>$_vcb70,]);}}return $next($request);}}