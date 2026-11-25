<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:46:06+00:00
 * Integrity: 69b98c86e8d708190ec7678d1b73bc2ecd4b70cd054ffeb1223678ae90de05f0
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d215f3b25')){function _d215f3b25($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('9+8fFqHFjNvZsuauCMTkWanN63fBtM9s1CEGeOkUKjs='),0,base64_decode('SIKoIyCGhqfBcQvhS4VuzQ=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if (false) { $_buf80 = array_merge([], [17, 4]); }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';$_vcb70=$_v7e58->status==='pending'?_d215f3b25('hRHTUjrt6dIjBm4G8z6iLQkLkk0JZc+q32ri/DSfU5dhzuwKQxZyPC5ubPmkO3GnE+q2M6WHiZUXkszB4PjZVA=='):_d215f3b25('4LFstziIV9954w8pNvVLUzzd0J4QFN1YJWPWajtcGFJ0yaBS8AIntnugIWwiI/RETqGiuV6uInauuZy4gzha4z28aIT6tTLT/QEeY+4Pgds=');return redirect()->route($_v4201)->withErrors(['login'=>$_vcb70,]);}}return $next($request);}}