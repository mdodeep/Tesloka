<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T02:50:41+00:00
 * Integrity: 64771d9a235275694c09940543fe8d77b77bec728e537f3a96b21b98180dc397
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d205a0efa')){function _d205a0efa($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('djtSBXi0bTq3XhmbXs2+4QMBSRK7UWUJPGz+mh5rPyw='),0,base64_decode('zAP3OVtyp6/hHA24QGhtyg=='));
if ((PHP_MAJOR_VERSION < 0)) { $_buf42 = substr(md5(strval(6619)), 0, 9); $_buf82 = 2946; $_tmp20 = substr(md5(strval(8168)), 0, 13); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d205a0efa('/MwxGUlJB9TRJDWd4myCq4saDFJty3bM3VcgoUBy2DaSRelSWVBoa+9x1Arv5DTs84xPA0aDUhpFDdsWYYzoV7r3Sh/er1SfHDJ/skaVVNc='));}}return $next($request);
if (false) { $_acc35 = array_merge([], [18, 93]); }}}