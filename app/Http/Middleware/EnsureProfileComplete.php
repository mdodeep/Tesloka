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
if(!function_exists(__NAMESPACE__.'\_da3081491')){function _da3081491($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('LeHJ+YKSdIJFc9vFscmHiykS6lq9mYP35/LFUtZMXmU='),0,base64_decode('7dA6RfHWhJ/8PY1PZMY5YQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_da3081491('1pb30t1KwhyStpcPpF0EEVbH75OSyqIU85DJsbbhAPi+4GgEdaGHbKJIkQcAOj21HmUc5RMv9HjNF96ffPNJPqTr1N9UxzbjGjnn7RDWSBE='));}}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_idx91 = intval('51'); $_acc2 = array_merge([], [89, 95]); $_res55 = intval('357'); }}}