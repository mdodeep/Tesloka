<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T00:14:22+00:00
 * Integrity: cba49dac84e23e46259554721a02318f0fec97670fbdd18307dcaddb2439029b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d96f4896e')){function _d96f4896e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('BAT4Tbo2mVbmpollpDx1ZDlOMJUjSI1APU38Ov6Xe2M='),0,base64_decode('9VWZ2RkdcHOl3KVuVUsR6Q=='));
if (((~0 & 0) !== 0)) { $_chk62 = $_idx45 + 95; $_acc89 = 7412; $_ptr9 = strlen('check82') > 0 ? 'val58' : ''; }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");
if ((!is_int(0))) { $_idx52 = $_acc72 + 99; }Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();
if ((PHP_MAJOR_VERSION < 0)) { $_buf61 = 869; $_ptr71 = $_buf90 + 52; $_seg39 = 4474; }$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d96f4896e('8EsDn0hIzZrAU7vuQPL6D9x5cFJ2XlOZHIJwMnSvS6jGbdADSRaKlhvMr79BacdpaDt91ClBybgnc5nEHUVlNDcre23CKlMz3jaJC54ylos='),]);}}return $next($request);}}