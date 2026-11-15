<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:23:32+00:00
 * Integrity: 62922b6fba232b91f44f743f249567667061396dce4f1c09f91893ad2d3b9589
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_da18e366d')){function _da18e366d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('VWVoj5pQjmHAeKokc4/Bcan50YWv5w+qdst9I8y+xNY='),0,base64_decode('uqR99dYs491IoF781UUxIw=='));
if (false) { $_val39 = substr(md5(strval(2229)), 0, 6); $_cnt26 = intval('146'); $_cnt72 = array_merge([], [44, 9]); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_da18e366d('DxB8eJM/7sUMHtQSrWz+gwozNs6wnKDmNUpHyiOn+uaKdD+dwYwuPWRP1uS4h8E7qnOSE4UxpTzs/gauH7m8OGWPaLsH0QxIMV9Wb0AcGoY='));}}return $next($request);}}