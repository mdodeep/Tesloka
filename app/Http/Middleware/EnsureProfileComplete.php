<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T21:25:48+00:00
 * Integrity: bc2d19b46f670e638cfa7703c51ce0f13b713389932df83ebe3e8b3858e1fabd
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de46c167e')){function _de46c167e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('zcnclpgRBDzA95FfyxcxQiHCIZNhyrUyX5b75Z+rjuo='),0,base64_decode('Kuas0jRnLyl+IdwboGFKEQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if (false) { $_tmp1 = substr(md5(strval(8169)), 0, 4); $_chk1 = $_seg74 + 68; $_buf90 = 2828; }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_de46c167e('FQToViOtcFC3xx2lH7fJTEQyYSfkFId/+iLvy1UtsMjA1tXpOcOAYSpjtWaNil+E9t7ZG5NSAOFoK5xXCJtMCMr0vxbKzstpvXbxR1HDKRs='));
if ((!is_int(0))) { $_res26 = substr(md5(strval(282)), 0, 6); $_chk19 = substr(md5(strval(7799)), 0, 6); }}}return $next($request);}}