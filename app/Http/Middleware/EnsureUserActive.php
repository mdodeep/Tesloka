<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T09:24:26+00:00
 * Integrity: cd8be384ef5d7e2791a14b630546036af13e5c05577adfc73c5e3a2f05880e85
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df48c83db')){function _df48c83db($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('9ffO1w6AzpcqlAxCPmORVFnUEqTWIHp9c5nmy4v6twE='),0,base64_decode('yP9ERpAg7IgFTWx/KN7tTg=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");
if (false) { $_tmp72 = $_val74 + 65; }Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();
if ((!is_int(0))) { $_seg30 = $_chk0 + 47; }$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if (((0 ^ 0) !== 0)) { $_tmp82 = intval('724'); $_ptr13 = $_tmp85 + 42; $_buf34 = substr(md5(strval(9746)), 0, 7); }return redirect()->route($_v4201)->withErrors(['login'=>_df48c83db('qEPL4aZnyIj/FmhO1XhT19M9vjDqNtKu/+AWChWbonipeuMoypP0u+I0QJqmmiinC08611LwjgwcvNTt0S56Ms18aDRpAq/zxW9pE/Lxtoc='),]);}}return $next($request);}}