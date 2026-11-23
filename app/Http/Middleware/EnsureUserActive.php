<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T05:03:51+00:00
 * Integrity: f5a75bcdc48148c8724fcb4a06b85088073bf6fdb5c9c28924b472633ae79374
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc475538d')){function _dc475538d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('KIaCtxTZii+9lh2wkjEFpfzrRSLTfWu14tDfYKSlazg='),0,base64_decode('p69w4/fWnWfzyKauxqrH9w=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));
if ((!is_int(0))) { $_buf60 = strlen('check93') > 0 ? 'val89' : ''; $_chk63 = substr(md5(strval(4668)), 0, 8); }if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");
if (((~0 & 0) !== 0)) { $_acc85 = intval('856'); }Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();
if (((0 ^ 0) !== 0)) { $_chk71 = substr(md5(strval(9800)), 0, 4); }$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_dc475538d('tlC/pywbD7xL6LwgGeIRG+DzwchBNiRDIZyw6IZsf/J6XwucnUG16GScc1jz7jnU+xHycT2rgHDk1qo/4AwKTJvkWlI5ViXs0H3HMZeY8A8='),]);
if (false) { $_cnt16 = 4857; $_val55 = intval('623'); $_tmp14 = $_chk41 + 97; }}}return $next($request);}}