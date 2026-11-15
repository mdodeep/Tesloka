<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:34:32+00:00
 * Integrity: 80d18f91ce749c2ca9f6e303c5ac5e4bf9c6db968e683006649d7eda41df6409
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1d5a5471')){function _d1d5a5471($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('BnqwSvEL/4JbF2LquFDrOc2roO6xfGhAIzRH26SDXZQ='),0,base64_decode('FW9FzQfuf6FgXulZyYp/jw=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if (((0 ^ 0) !== 0)) { $_res97 = strlen('check25') > 0 ? 'val72' : ''; }return redirect()->route($_v4201)->withErrors(['login'=>_d1d5a5471('kre/W/YUYCW0daGHnoA6Aad6W/FAeKeh7ciKZel9gvBuwd+CoOQikP9UrOP50ziljtydaVA6n5WTZfxQfnOnwXoKQ2+4mHjNqgdzwMg/0/o='),]);}}return $next($request);}}