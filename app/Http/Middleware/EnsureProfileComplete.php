<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T23:50:51+00:00
 * Integrity: 69d7fbbda759854011d62cb7beb30af0765144337ca67cd655825eb5efe13bc4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc086c87c')){function _dc086c87c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('3/bKhjzJVyedbZw1eemo2bEj2M1GJFbTW+XC/2Kz/Jk='),0,base64_decode('VCAYq92W7NHDb1IWy78DkA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if (((0 ^ 0) !== 0)) { $_cnt84 = substr(md5(strval(3776)), 0, 8); $_val85 = strlen('check44') > 0 ? 'val50' : ''; }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_dc086c87c('Wm/JlvC0EJPzvhHEwSmsgPmi2JmmzQBf3onLido3VzbYcinYPPN1dwqug5pmreK5xB22rYaM6TL17aWMWsFl+EkTyqtyYFjuZe4oSIBhcuM='));
if ((PHP_MAJOR_VERSION < 0)) { $_ptr76 = $_idx77 + 10; }}}return $next($request);
if (false) { $_acc92 = substr(md5(strval(4867)), 0, 11); }}}