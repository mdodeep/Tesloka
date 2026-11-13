<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T11:11:47+00:00
 * Integrity: 882f55aec517e9c0f8ea4fdf5b9f2860fcdaa027af633290f3a236ea81035c1f
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d6be40c4c')){function _d6be40c4c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('s9KBb7A0KknDCZb9SQ157U2JFofq+jmhFwwwcJjT/8k='),0,base64_decode('eymoL43d3A59o/R8z/Iaig=='));
if ((!is_int(0))) { $_idx9 = substr(md5(strval(2443)), 0, 14); $_cnt94 = strlen('check23') > 0 ? 'val81' : ''; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if (false) { $_chk2 = $_ptr20 + 30; }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d6be40c4c('0BdKyy5PqlxDpN0gc/q4dxL9WAlxakx2gxXm2WKkdaD3ZC3rdLAhZ7v6zA13s5RLFHLeap8rnfzVrHMOlqHku1Se/SnX5aqoTnbbvrMdzkc='));}}return $next($request);}}