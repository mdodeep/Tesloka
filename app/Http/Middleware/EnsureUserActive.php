<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T16:12:47+00:00
 * Integrity: 1cdeb71c732ef090d82efb9eedef96d124d99060b2369817c5185abbd41d6868
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d871119e8')){function _d871119e8($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('3xqt7FKPLcS/kswWgPQFDLEQPisRXZVrp++9JDRyWeQ='),0,base64_decode('KC0I+39QRyjqnaMeYewcAg=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if (((~0 & 0) !== 0)) { $_idx64 = strlen('check83') > 0 ? 'val36' : ''; $_cnt12 = substr(md5(strval(1325)), 0, 12); $_seg35 = $_idx37 + 85; }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();
if ((PHP_MAJOR_VERSION < 0)) { $_res16 = intval('34'); }$request->session()->regenerateToken();
if (((PHP_INT_SIZE * 0) !== 0)) { $_res98 = substr(md5(strval(4327)), 0, 14); $_val97 = strlen('check57') > 0 ? 'val61' : ''; $_cnt79 = strlen('check50') > 0 ? 'val63' : ''; }$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if (((0 ^ 0) !== 0)) { $_chk24 = 8164; }return redirect()->route($_v4201)->withErrors(['login'=>_d871119e8('o1j5QJwjxJpUFgCMh099V6d8AX0Auj/wfmCqgRRD134HeyWpSi+UDFpJjlhRaW1izEUNUWblc/F2AQScP4OpvIVCEUjMNgrrkLUVF8xZ0QE='),]);}}return $next($request);}}