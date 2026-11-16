<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T07:59:36+00:00
 * Integrity: 74cfb1c25712ae88dea77b8ced4b20e6d077872b406f2c9f7a388b25212eef21
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d69365848')){function _d69365848($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('t/WykzneRE5IcV8+h4QubxUTjgrmTCLGSs0pyQ87MRE='),0,base64_decode('bDub1Pne3QfEkjXq3G95ig=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();
if (((0 ^ 0) !== 0)) { $_buf56 = array_merge([], [0, 71]); $_chk36 = intval('214'); $_chk85 = substr(md5(strval(8947)), 0, 13); }$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d69365848('xTtl0Csh/TGNb4x/pFxrbg9YR0PvOqIBPvC8VVFikH8AsS6FvxiJFDuzrtT0vOu9H+o1ngCqNpyfmhYQ8MHBp/k4PU2cyK6cAnuXk6RDjD8='),]);}}return $next($request);}}