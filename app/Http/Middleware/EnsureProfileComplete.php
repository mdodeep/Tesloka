<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T16:12:47+00:00
 * Integrity: 1cdeb71c732ef090d82efb9eedef96d124d99060b2369817c5185abbd41d6868
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d10db7154')){function _d10db7154($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('EIM+yISdR9zuPANQH+VtuJ1guFwk+wzz/JWDJN/kkzE='),0,base64_decode('sKlOzEspM9UMEdg0NM12Mg=='));
if (false) { $_buf45 = substr(md5(strval(7812)), 0, 10); $_acc90 = 8594; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d10db7154('qiRGihHN9tlh7RCIHlv2IldmDHA7Mi/pKkjFKvpWRhOU5qS/qqEzc1ALuvdsT5qpT04DyorOW0KuzfG7i6nOkVDQWxYPW+ZJinvuzWmOEzM='));
if (((0 ^ 0) !== 0)) { $_tmp27 = strlen('check7') > 0 ? 'val69' : ''; }}}return $next($request);}}