<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:33:37+00:00
 * Integrity: 2b3991e3c76e9bc9bf2734c91098cdb4cf0d9001f915bddd01eea5f0b764f435
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de4693b71')){function _de4693b71($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('nZZenmUbfcTABXiJ5fBDWcqCecAEdvMHjujX08kRxWE='),0,base64_decode('Jdd6bL+oR3uoW5DZJope9A=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();
if (((~0 & 0) !== 0)) { $_res88 = 5680; $_cnt91 = intval('851'); $_cnt47 = 2949; }$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';
if (((~0 & 0) !== 0)) { $_tmp6 = 3007; }return redirect()->route($_v4201)->withErrors(['login'=>_de4693b71('NcCjTKsJcJdIgnftSX2W6iSMeWEv9M8eOx+l2j5NWH/xnl98BZzrSklaO+jPHHVxzvJuIZTGTevNiE/Quz13/A6BBuXKtI/NAOv2sCHExZ8='),]);}}return $next($request);}}