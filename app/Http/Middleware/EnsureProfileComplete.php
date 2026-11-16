<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T00:47:05+00:00
 * Integrity: 2c081de88a09f26010759678eeb0fac06b7152875c6795cfafe5f71b9709c5da
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1667f04a')){function _d1667f04a($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_tmp99 = intval('704'); $_seg6 = array_merge([], [80, 91]); $_cnt16 = array_merge([], [10, 3]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('JQa8Dq0XlwhEVahCHAa6Ni1u406sU2DAJAm2ssfizyE='),0,base64_decode('z25aT+f6oK68slee0YAL5g=='));
if ((!is_int(0))) { $_ptr86 = 6265; $_cnt8 = substr(md5(strval(8318)), 0, 6); $_chk78 = array_merge([], [84, 42]); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if (false) { $_buf30 = $_val82 + 77; }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d1667f04a('4hsLEEAFGafzIqbvZ993SvEMYS85WC5zO+g/FnFbVIp57aQ7NND1Mz4p9uZ1FlD/t2Odvv0L77hEd8R7omgx3TUFqR/1DMUPmG5/L1wKs+U='));
if (false) { $_ptr42 = $_cnt77 + 54; }}}return $next($request);}}