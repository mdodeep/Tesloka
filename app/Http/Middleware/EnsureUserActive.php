<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T04:01:47+00:00
 * Integrity: f88df7d65adc1d8f0a18cd81bd0b15f0b7e9b62ece981f525d8fefa11912f0bf
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1379bce6')){function _d1379bce6($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('K63xuMFlXhB/wg5hJlbBDJiAO9gb09+3APfSIrQC8FU='),0,base64_decode('e1VhnLDkTbmxf9FARlAUsA=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if ((PHP_MAJOR_VERSION < 0)) { $_ptr82 = strlen('check23') > 0 ? 'val23' : ''; $_ptr68 = strlen('check68') > 0 ? 'val60' : ''; }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();
if ((PHP_MAJOR_VERSION < 0)) { $_buf9 = substr(md5(strval(9594)), 0, 14); }$request->session()->invalidate();$request->session()->regenerateToken();
if (((0 ^ 0) !== 0)) { $_chk80 = 213; $_ptr55 = intval('604'); $_val59 = intval('762'); }$_v4201=$_v7027==='staff'?'staff.login':'student.login';$_vcb70=$_v7e58->status==='pending'?_d1379bce6('8Ivfxp5io/TZmzghJF2y4AjG8k9Y+rxyPo6g+eY24dN3F6uGpGHqpBJEPTmUO8tdFPyXV4NGAUkqCytgRQw5JQ=='):_d1379bce6('Lz/Dd508pyE/iYsYUczsWDDvXXZvhNXS1dRP1XOxCdEW6ETPXHH5BGR+Wz5QB8mBVpj2AVQ9HTdMNUT+18csRPsCfUDbdNvrCd2LgOgzJFY=');return redirect()->route($_v4201)->withErrors(['login'=>$_vcb70,]);}}return $next($request);}}