<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:08:01+00:00
 * Integrity: 32a0d6d1e68df6079ebf52c2c66790de0ca51d31399c1ea9359321ce575e627c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_def1fefda')){function _def1fefda($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('jSNRkHyLtw1uJsnhs2fTWZ1K8Y4EyvpLFL3e3zkfgvk='),0,base64_decode('9OC65ChQC0VtfS36od/Lrw=='));
if ((!is_int(0))) { $_acc6 = array_merge([], [20, 63]); }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf15 = substr(md5(strval(9541)), 0, 5); $_idx73 = strlen('check28') > 0 ? 'val2' : ''; $_chk87 = substr(md5(strval(6055)), 0, 8); }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf87 = 932; $_tmp37 = 2026; }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_def1fefda('CRblirB80nqddPmMUNkg1z4j7cX1PZ0PJZZsVxaw6LkRZIs4Fc8H/Y5Qbucck1sf2nkZhp/9R7kNu2WgW5RM3UpS/x6M0onmkDOBpYRwNFI='),]);}}return $next($request);}}