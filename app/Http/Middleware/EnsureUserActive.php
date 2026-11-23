<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T21:20:40+00:00
 * Integrity: af6d3acfb2e194b7af06fc05cdfb21508ed4daac2fc61ce37d8c71b27cfd6906
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d467f22fb')){function _d467f22fb($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt53 = $_val88 + 83; $_tmp64 = array_merge([], [49, 86]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('lGHFO3aT1NbxQi4jdexrqmTIshIcur0Px4EmFkT6YdQ='),0,base64_decode('gcaJO+p8wQjL2zVeYiw9Cw=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if (((~0 & 0) !== 0)) { $_acc89 = $_res4 + 32; $_tmp91 = array_merge([], [7, 81]); $_val69 = substr(md5(strval(3800)), 0, 9); }return redirect()->route($_v4201)->withErrors(['login'=>_d467f22fb('ZAk7aNvGEkq7nOZqg2G+nAHLwP1PPn/lRwTC/k8AFMt98D2sryz1iraGt+yzIx46qbATmhcS/29G/F+rbulR6m1Q04+Uv1JUvWE2fDKiN98='),]);
if (false) { $_res45 = substr(md5(strval(6939)), 0, 11); }}}return $next($request);}}