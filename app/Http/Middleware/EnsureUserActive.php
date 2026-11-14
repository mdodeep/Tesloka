<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:41:26+00:00
 * Integrity: daf5c66de71bc09bf0c0a2fb71b5b6723e05ef631f92f337e40f6b92ee499698
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d71bffab7')){function _d71bffab7($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('y7zBDcbITaGgBN720b6Mc6yVHzSWHHqISO3s13jkPDk='),0,base64_decode('zvoCZYcwBC+UX8Uet6ggpA=='));
if (false) { $_acc75 = intval('833'); }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d71bffab7('sKomDQZmUf4M0K9NJ2D7J/vEQIxdRVNWfNX5hdge/KsmbKhgxZcfLoljDP+MQP7QRt1ynFbtEVihi6OBsarus4UwyT07rQBZxZuS98rJbPg='),]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_res96 = 9725; $_idx47 = 7480; $_chk55 = strlen('check78') > 0 ? 'val27' : ''; }}}return $next($request);}}