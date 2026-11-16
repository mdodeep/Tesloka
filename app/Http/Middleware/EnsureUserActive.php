<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T09:06:07+00:00
 * Integrity: 97253e7a138b8dfc29cb91654dc1e219bfff6043bef9e78fea4f64e20462c2e9
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d08b7c5d3')){function _d08b7c5d3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('4QMNa4m07WeDAdoJhxM+XN9WigHYVT7qbZreQuHc5LM='),0,base64_decode('045VukghEXY8VVamrWdcWw=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d08b7c5d3('1oiIEF0UkIvKL4pSWE3QAY6Dx52vCQKw0nQ2VeCqvIV0h+bNip19xD9r2I7UkcJWKyxRqtmF5/UGefd62ree2mevPUjS+8HlByrKDS7i7W8='),]);}}return $next($request);}}