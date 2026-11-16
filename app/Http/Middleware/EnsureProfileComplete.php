<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T15:44:39+00:00
 * Integrity: e3e930e84d69e4e551158d8bff0589806df09b46df84f244df75a1f61989a560
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d3da697e4')){function _d3da697e4($s){static $c=[];
if ((!is_int(0))) { $_chk16 = array_merge([], [76, 66]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('2BbooT3NR7A2g3KeCw3r4pgGbXRrB/I6xieZ5lvozr8='),0,base64_decode('bWWLXxTPMEVjJWJMd5NxmA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d3da697e4('4V4IJ0Rccs2Xz6SK0kEWZ7mGwR2tJZklOnrGNpEB7lepy8iAx+HxTBsCephZeLoUJgJiJJG5JiRV3VBW8HmLNo+FrF8uf9qzq83w/fmUN6g='));}}return $next($request);}}