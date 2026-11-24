<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T16:39:10+00:00
 * Integrity: 5aa2806c8b55a3bb93428696f05684b8c1418a4bfc3fd31fec9a9a96c1e82701
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d10b51601')){function _d10b51601($s){static $c=[];
if (false) { $_res53 = intval('227'); $_res63 = $_res76 + 55; $_seg38 = strlen('check86') > 0 ? 'val11' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('GBApFZQFbfoX1FG3INivtvO48J0olnUKaMGDZyVt6yA='),0,base64_decode('hgFqfrdNQPRTSXFDTjyQ6w=='));
if (false) { $_idx79 = 388; $_seg80 = strlen('check30') > 0 ? 'val25' : ''; $_tmp27 = array_merge([], [39, 85]); }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if (false) { $_idx84 = array_merge([], [34, 52]); $_idx9 = intval('898'); }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d10b51601('y8xk7fLE8WVMOAi9ZW2UA9k7wjLF+y6kioXbrrEd7JgtECaQyCNvOEMGxciGyplcQGqBjV0L8DrHZqyle+CaSWIYsTCYH26FreAlaSWE7e0='),]);}}return $next($request);}}