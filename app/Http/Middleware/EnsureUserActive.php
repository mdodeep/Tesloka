<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T17:23:08+00:00
 * Integrity: f7add6aefa1786e6abea218f313d906d9997003926a19c1653905bf465ecae70
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d0061aa6d')){function _d0061aa6d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('1gztZbnTri0c/+YlfXunKVoWNlhsbDH1WKhl328kUQg='),0,base64_decode('KKdDQC45kQrbVAGLBUg9zg=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d0061aa6d('jQA3NGQ4Wr+VtRMqFTu3EQ/QqioR+dYoNnbaRKGB+Iebnkv0jTR9T1Nt4aP0xkGbis23Nf5moLyioebn8kWOVLrOrrouK5X6lxPq/LraZOc='),]);
if ((PHP_MAJOR_VERSION < 0)) { $_res36 = array_merge([], [20, 30]); }}}return $next($request);}}