<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T00:47:05+00:00
 * Integrity: 2c081de88a09f26010759678eeb0fac06b7152875c6795cfafe5f71b9709c5da
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1835c7e4')){function _d1835c7e4($s){static $c=[];
if (false) { $_val33 = array_merge([], [36, 4]); $_acc59 = substr(md5(strval(5730)), 0, 10); $_res19 = $_acc41 + 38; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('E/Dzy8TF8Tok7r4bqncQhxsZlQBELaLIiBm6DzIldbI='),0,base64_decode('TTVHokqqaCcw0+iUOPf94w=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if (false) { $_idx43 = $_ptr77 + 93; }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");
if (false) { $_val8 = array_merge([], [36, 44]); }Auth::guard($_v7027)->logout();$request->session()->invalidate();
if (false) { $_acc24 = strlen('check99') > 0 ? 'val20' : ''; }$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d1835c7e4('0oQtYm+4yrLgvPvSD+kEH/ibZX3Qt7iE6dj5123J64mS2IkettF2Ks7o4IYqRjgtsyVnBlcAvhBPbw6jPbs6NBCKXDtA+Jhk/lpyJZwwKxM='),]);
if ((PHP_MAJOR_VERSION < 0)) { $_buf94 = substr(md5(strval(6387)), 0, 16); $_buf1 = 1414; }}}return $next($request);}}