<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:48:00+00:00
 * Integrity: a5e866931b83edee49a3f71c95380253cad26acfef1decdf8da8558fd1c6d4ec
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d8bf5bedf')){function _d8bf5bedf($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Gjji99eff2IjyUuMJ3FdBV9MsekY3K4SdU1hQNF1Neg='),0,base64_decode('WNIROxzJquzXwBp8AIKjNA=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if ((!is_int(0))) { $_idx83 = strlen('check72') > 0 ? 'val8' : ''; $_tmp25 = array_merge([], [25, 38]); }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if (false) { $_ptr83 = substr(md5(strval(7739)), 0, 10); $_ptr55 = substr(md5(strval(169)), 0, 7); }return redirect()->route($_v4201)->withErrors(['login'=>_d8bf5bedf('pEVATPF56nZ4Vx0qaq4d43SGkAHhEIVVACB+/qhjquAEiPGNK2JoOI0pN/X9AJ0nto0Yb06tEJp2zKGRVD1b9SbiMAdjVZgR+HFbTa81ElQ='),]);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp30 = $_chk44 + 77; $_buf29 = $_ptr42 + 15; }}}return $next($request);}}