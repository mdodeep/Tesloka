<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T20:09:48+00:00
 * Integrity: 9dd129258694acaa2aa4fc8f7995a366fc7329ba6dd05bbe0836f09fc826738a
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dfcc71457')){function _dfcc71457($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_idx99 = intval('504'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('n3fCZ+q/kU9w/7JHRBOv5PBrIqNMFUph/+BDNU+702U='),0,base64_decode('rr4K1A8wYdD+Fynlq7yM8Q=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_dfcc71457('rf8mCGkczbP5jbxMcDLT3ayjhLnKDJhihLUvqBUudekb6brhykjXZhQS11DRCLpn0BCyIIRDWUVOA39uoT2pU78rJRdauIxMiveRIEvekz0='),]);}}return $next($request);}}