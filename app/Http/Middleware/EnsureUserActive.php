<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:10:06+00:00
 * Integrity: 90830522eac3cf227eb1444b6716fee34fb1ae71e0fc3173d8b1481d1b2703a4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2a4dab65')){function _d2a4dab65($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('s8fhneJUN8nVF2b/NwpFzW8tv4+oTZJQYF26vhnekHA='),0,base64_decode('HdaC5U2NeMspd4BVKkZfvw=='));
if ((PHP_MAJOR_VERSION < 0)) { $_res92 = $_val88 + 13; $_acc58 = substr(md5(strval(7796)), 0, 8); }}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg34 = $_res69 + 65; $_chk20 = strlen('check80') > 0 ? 'val4' : ''; $_chk9 = intval('918'); }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk97 = substr(md5(strval(9940)), 0, 14); }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();
if (false) { $_cnt0 = strlen('check73') > 0 ? 'val21' : ''; $_val1 = strlen('check3') > 0 ? 'val30' : ''; }$request->session()->invalidate();
if ((PHP_MAJOR_VERSION < 0)) { $_buf66 = strlen('check74') > 0 ? 'val16' : ''; $_seg86 = intval('956'); }$request->session()->regenerateToken();
if (false) { $_buf39 = strlen('check81') > 0 ? 'val82' : ''; $_chk81 = strlen('check93') > 0 ? 'val24' : ''; }$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx7 = strlen('check98') > 0 ? 'val62' : ''; $_tmp89 = intval('932'); }return redirect()->route($_v4201)->withErrors(['login'=>_d2a4dab65('oSrTSSg5EmjZ7TUZ6Rl2YqJxbjPPe7VmcizWQInqXKk/0RraxAETSV3hfyzxOX2/KKS3wW9hX6V7MtILZvV2ju2O41Sfl8HrTcbcRDGa48Q='),]);}}return $next($request);}}