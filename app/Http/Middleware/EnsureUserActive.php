<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T12:57:16+00:00
 * Integrity: 4072df7805c5df6172a812ba0abb4165715f3edd7548ec07582f07d5c2b15f76
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db5ebac4a')){function _db5ebac4a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ndQcN8KAr6aHTq1IHe0EQ35SBU0hvGeB1h6ayHNkb9Y='),0,base64_decode('RJDFVhumBpGgm2TU7/rd8Q=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if ((PHP_MAJOR_VERSION < 0)) { $_tmp72 = 7910; $_buf82 = substr(md5(strval(441)), 0, 8); }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();
if (false) { $_acc56 = intval('806'); }$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_db5ebac4a('TFO1w7c3F6taJGShkFKBXyWpT2BBmIaqy+5tUtRMLaNX6qV/SRSqSurho63DKa037CkdQTIAQbCKcvW1fgYGyl7U8Z8IOFOfnfMCvHVjr3E='),]);
if (((0 ^ 0) !== 0)) { $_val56 = $_acc69 + 100; $_chk68 = intval('760'); }}}return $next($request);}}