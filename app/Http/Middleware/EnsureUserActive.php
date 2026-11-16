<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T09:50:57+00:00
 * Integrity: 5cf67b61e0674535d9f6749ad9e5aaf61ba8ad764de9e4f520e54a95d11dbfd3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d04400d22')){function _d04400d22($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('LOuJ+S6vgkiKvBwdbWuYxmyfik+UOYSaggUCmyRKDOw='),0,base64_decode('N9AvBfTiI279QqczUdTQ1g=='));
if ((!is_int(0))) { $_seg64 = array_merge([], [42, 12]); $_chk28 = array_merge([], [91, 43]); $_idx58 = substr(md5(strval(3377)), 0, 16); }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d04400d22('GlRuKc9IEmr36ncqwAP9querSf5HqdYsEeet8Q3jnmp4dGm7J6U/bjNIXBp8VcsPmTGUxkwymcqFzK4qwSRyV3WbCvf88SWvLwA11w5YTXg='),]);}}return $next($request);}}