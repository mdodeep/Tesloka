<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:18:26+00:00
 * Integrity: 3ddb70f39474a65d6f1e659715367dfdc86ba7125b0cb12cfc1c6446c744b981
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5051ed4c')){function _d5051ed4c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('+l5iblJROE1lyCrU3LCEuUvcZzskaYBgffrnJMFMPAE='),0,base64_decode('78S+uJVLojn2nX3es/W0hQ=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_res26 = substr(md5(strval(7112)), 0, 13); $_idx27 = substr(md5(strval(5201)), 0, 16); $_chk93 = intval('144'); }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_d5051ed4c('pWkTIj0R2V+wM7KLw5nT//RqGmwdFzY7dzTNCFAsMbp8ok4vLh9Sk4Us6+vTKr9Z3itBfcRCZZz/3tyZi7PTQPVft+BvpwTDH4Wxmczhw4Y='),]);}}return $next($request);}}