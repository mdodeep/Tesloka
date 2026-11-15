<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T06:42:17+00:00
 * Integrity: b463240aa949947e7c92e3e9a908659b247406f07d59d5f537c214f6a4e9553e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_da443a13a')){function _da443a13a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('wYiZRm4qmS4Z3rvRPZUds5r2ZI08LxAeDGWLVe4Vxa0='),0,base64_decode('Vluzgzhi5gATnioI4Sz2VA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_da443a13a('odSbAXUPM1D5R5uXhpKb8xQ/aFSr5+R38ZBTvT+RrZuOYkEr1BYxw0cXXfoIbqlozz7Db0PQln3LqyOFDGVEgbwuPlBG3mvidrvdE2077t8='));}}return $next($request);
if (false) { $_res76 = array_merge([], [53, 36]); $_chk39 = substr(md5(strval(7184)), 0, 12); }}}