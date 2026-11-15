<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:14:13+00:00
 * Integrity: 18b57aa627fd74aee36ec4e10d76eb437cbf3e3f51cf591ed361ffcb18cf37ac
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dce7b064c')){function _dce7b064c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('NppMSmoKrGwFELyasPtAefEJ9wCCJ92EYaRTAUiQNRc='),0,base64_decode('TW75zcneDs2WUxzfuwWVdQ=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if ((PHP_MAJOR_VERSION < 0)) { $_res54 = substr(md5(strval(8915)), 0, 13); }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if ((!is_int(0))) { $_cnt97 = substr(md5(strval(2575)), 0, 12); }return redirect()->route($_v4201)->withErrors(['login'=>_dce7b064c('Uz4eolozy6FT9R9HkEnUFTmuRmiDhMox4i2ITbPCCH3LuA+HUOYSHraEx/gHvoeclwKD98FjEokRTPd985mOX7xg11fB7P/IS+hnWxP4QuU='),]);}}return $next($request);}}